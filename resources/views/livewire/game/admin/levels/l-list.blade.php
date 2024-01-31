<x-x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Levels</h1>
            </div>
        </div>

        <x-modal id="edit-level" wire:model="levelModal" title="Level Edit">
            <x-form wire:submit="save">
                <x-input label="Level" wire:model="level" />
                <x-input label="XP Req" wire:model="next_level_experience" />
                <x-slot:actions>
                    <x-button label="Save" wire:click="save" spinner />
                    <x-button label="Cancel" wire:click="cancel" />
                    </x-slot:actions>
            </x-form>
        </x-modal>
    </div>
    </x-x-layout>
