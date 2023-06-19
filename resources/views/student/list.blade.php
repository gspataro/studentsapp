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

    <table class="w-full">
        <thead>
            <tr>
                <th class="p-2 border-b border-b-gray-200 text-left">Name</th>
                <th class="p-2 border-b border-b-gray-200 text-left">Surname</th>
                <th class="p-2 border-b border-b-gray-200 text-left">City</th>
                <th class="p-2 border-b border-b-gray-200 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td class="p-2 border-b border-b-gray-200 text-left">{{$student->name}}</td>
                    <td class="p-2 border-b border-b-gray-200 text-left">{{$student->surname}}</td>
                    <td class="p-2 border-b border-b-gray-200 text-left">{{$student->city}}</td>
                    <td class="p-2 border-b border-b-gray-200 text-left">
                        <ul class="flex gap-1">
                            <li>
                                <a href="{{route('student.update', ['student' => $student])}}">
                                    Edit
                                </a>
                                <a href="#">
                                    Delete
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
