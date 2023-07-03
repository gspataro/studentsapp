<div>
    @empty ($grades)
        <div class="px-5 py-10 text-center">
            <h3 class="text-lg mb-3">No grades found</h3>
            <x-input.button label="Add Grade" wire:click="addGrade" />
        </div>
    @else
        <div class="grid">
            <div class="grid col-span-4 grid-cols-[subgrid]">
                <div class="p-3 border-b border-b-gray-200 text-left">Subject</div>
                <div class="p-3 border-b border-b-gray-200 text-left">Grade</div>
                <div class="p-3 border-b border-b-gray-200 text-left">Date</div>
                <div class="p-3 border-b border-b-gray-200 text-left">Actions</div>
            </div>
            @foreach ($grades as $grade)
                <livewire:grade.edit :student="$student" :grade="$grade" :editMode="$addNew" :wire:key="$loop->index" />
            @endforeach
            <div class="col-span-4 p-2 text-center">
                <x-input.button label="Add Grade" wire:click="addGrade" :disabled="$editMode" />
            </div>
        </div>
    @endempty
</div>
