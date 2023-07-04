<div class="grid col-span-4 grid-cols-[subgrid]">
    @if ($editMode)
        <form class="contents" wire:submit.prevent="submit">
            <div class="p-2 border-b border-b-gray-200 text-left">
                <x-input.text class="py-1 px-0 border-0 border-b rounded-none outline-none focus:border-gray-400" wire:model="grade.subject" />
                @error('grade.subject') <div class="text-red-600">{{$message}}</div> @enderror
            </div>
            <div class="p-2 border-b border-b-gray-200 text-left">
                <x-input.text class="py-1 px-0 border-0 border-b rounded-none outline-none focus:border-gray-400" wire:model="grade.grade" />
                @error('grade.grade') <div class="text-red-600">{{$message}}</div> @enderror
            </div>
            <div class="p-2 border-b border-b-gray-200 text-left">
                <x-input.date class="py-1 px-0 border-0 border-b rounded-none outline-none focus:border-gray-400" wire:model="grade.date" />
                @error('grade.date') <div class="text-red-600">{{$message}}</div> @enderror
            </div>
            <ul class="flex gap-3 items-center p-2 border-b border-b-gray-200 text-left">
                <li>
                    <button type="submit">Save</button>
                </li>
                <li>
                    <span wire:click="cancel" class="cursor-pointer">Cancel</span>
                </li>
            </ul>
        </form>
    @else
        <div class="p-2 border-b border-b-gray-200 text-left">
            {{$grade->subject}}
        </div>
        <div class="p-2 border-b border-b-gray-200 text-left">
            {{$grade->grade}}
        </div>
        <div class="p-2 border-b border-b-gray-200 text-left">
            {{$grade->date}}
        </div>
        <div class="p-2 border-b border-b-gray-200 text-left">
            <ul class="flex gap-3">
                <li>
                    <span wire:click="edit" class="cursor-pointer">Edit</span>
                </li>
                <li>
                    <span wire:click="delete" class="cursor-pointer">Delete</span>
                </li>
            </ul>
        </div>
    @endif
</div>
