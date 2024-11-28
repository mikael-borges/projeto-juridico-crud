<div class="space-y-6">
    
    <div>
        <x-input-label for="commitments" :value="__('Commitments')"/>
        <x-text-input id="commitments" name="commitments" type="text" class="mt-1 block w-full" :value="old('commitments', $legal?->commitments)" autocomplete="commitments" placeholder="Commitments"/>
        <x-input-error class="mt-2" :messages="$errors->get('commitments')"/>
    </div>
    <div>
        <x-input-label for="deadline" :value="__('Deadline')"/>
        <x-text-input id="deadline" name="deadline" type="text" class="mt-1 block w-full" :value="old('deadline', $legal?->deadline)" autocomplete="deadline" placeholder="Deadline"/>
        <x-input-error class="mt-2" :messages="$errors->get('deadline')"/>
    </div>
    <div>
        <x-input-label for="lawyer_id" :value="__('Lawyer')"/>
        <select name="lawyer_id" id="lawyer_id" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">Select a Lawyer</option>
            @foreach ($lawyers as $lawyer)
                <option value="{{ $lawyer->id }}" {{ old('lawyer_id', $lawyer?->lawyer_id) == $lawyer->id ? 'selected' : '' }}>
                    {{ $lawyer->name }}
                </option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('lawyer_id')"/>
    </div>
    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>