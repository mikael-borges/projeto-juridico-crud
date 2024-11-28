<div class="space-y-6">
    
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $lawyer?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="specialization" :value="__('Specialization')"/>
        <x-text-input id="specialization" name="specialization" type="text" class="mt-1 block w-full" :value="old('specialization', $lawyer?->specialization)" autocomplete="specialization" placeholder="Specialization"/>
        <x-input-error class="mt-2" :messages="$errors->get('specialization')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>