<div class="flex-col px-8 space-y-4 md:px-12">
  <x-hub::slideover title="Edit site setting" form="save" wire:model="siteSettingId">
    @if($this->setting)
      <div class="space-y-4">
        <x-hub::input.group label="Key" for="key">
          <x-hub::input.text disabled wire:model="setting.key" />
        </x-hub::input.group>

        <x-hub::input.group label="Value" for="value" :error="$errors->first('setting.value')">
          <x-hub::input.text wire:model="setting.value" />
        </x-hub::input.group>

        <x-hub::button>Save</x-hub::button>
      </div>
    @endif
  </x-hub::slideover>

  <div class="flex-col space-y-4">
    <x-hub::table>
      <x-slot name="head">
        <x-hub::table.heading>
          Key
        </x-hub::table.heading>
        <x-hub::table.heading>
          Value
        </x-hub::table.heading>
        <x-hub::table.heading></x-hub::table.heading>
      </x-slot>
      <x-slot name="body">
        @forelse($this->settings as $setting)
          <x-hub::table.row>
            <x-hub::table.cell>
              {{ $setting->key }}
            </x-hub::table.cell>

            <x-hub::table.cell>
              {{ $setting->value }}
            </x-hub::table.cell>

            <x-hub::table.cell>
              <x-hub::button type="button" wire:click="$set('siteSettingId', {{ $setting->id }})" theme="gray" size="sm">Edit</x-hub::button>
            </x-hub::table.cell>
          </x-hub::table.row>
        @empty
          <x-hub::table.no-results>
            There are currently no site settings available, these need to be added to the database directly.
          </x-hub::table.no-results>
        @endforelse
      </x-slot>
    </x-hub::table>
  </div>
</div>
