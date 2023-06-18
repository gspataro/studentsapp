<x-layout>
    <x-slot:title>Students List</x-slot>
    <x-slot:actions>
        <x-actions :items="[
            [
                'label' => 'New Student',
                'url' => route('student.new')
            ]
        ]"/>
    </x-slot>

    Hello world!
</x-layout>
