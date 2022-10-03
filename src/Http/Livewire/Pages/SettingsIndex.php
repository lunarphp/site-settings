<?php

namespace Lunar\Settings\Http\Livewire\Pages;

use Lunar\Hub\Http\Livewire\Traits\Notifies;
use Lunar\Settings\Models\Setting;
use Illuminate\Support\Collection;
use Livewire\Component;

class SettingsIndex extends Component
{
    use Notifies;

    /**
     * The site setting id to edit.
     *
     * @var int
     */
    public $siteSettingId = null;

    /**
     * The setting model being edited
     *
     * @var Setting|null
     */
    public ?Setting $setting = null;

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        $rules = [
            'setting.key' => 'required',
        ];

        if ($this->setting) {
            $rules['setting.value'] = $this->setting->validation;
        }

        return $rules;
    }

    /**
     * Handler when site setting id changes
     *
     * @param int $val
     *
     * @return void
     */
    public function updatedSiteSettingId($val)
    {
        $this->setting = Setting::find($this->siteSettingId);
    }

    /**
     * Return the available site settings
     *
     * @return Collection
     */
    public function getSettingsProperty()
    {
        return Setting::get();
    }

    /**
     * Save the site setting
     *
     * @return void
     */
    public function save()
    {
        $this->validate();
        $this->setting->save();
        $this->setting = null;
        $this->siteSettingId = null;

        $this->notify('Site setting updated');
    }

    /**
     * Render the livewire component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('settings::index')
            ->layout('adminhub::layouts.settings', [
                'title' => 'Site Settings',
                'menu' => 'settings',
            ]);
    }
}
