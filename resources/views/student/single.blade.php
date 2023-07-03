<x-layout>
    <x-slot:title>
        View Student
    </x-slot>
    <x-slot:styles>
        @livewireStyles
    </x-slot>
    <x-slot:scripts>
        @livewireScripts
    </x-slot>

    @php($meta = [
        [
            'label' => 'Full Name',
            'value' => $student->name . ' ' . $student->surname
        ],
        [
            'label' => 'Birthday',
            'value' => $student->birthday
        ],
        [
            'label' => 'City',
            'value' => $student->city
        ],
        [
            'label' => 'Institute',
            'value' => $student->institute->name
        ]
    ])

    <div class="grid grid-cols-2 gap-2 mb-2">
        @foreach ($meta as $item)
            <div class="p-3 border-2 border-gray-200 rounded-lg">
                <h3 class="uppercase font-semibold">{{$item['label']}}</h3>
                <div>{{$item['value']}}</div>
            </div>
        @endforeach
    </div>
    <div class="border-2 border-gray-200 rounded-lg">
        <livewire:grade.table :student="$student" />
    </div>
</x-layout>
