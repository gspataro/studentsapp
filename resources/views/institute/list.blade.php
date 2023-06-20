<x-layout>
    <x-slot:title>
        Institutes List
    </x-slot:title>
    <x-slot:actions>
        <x-actions :items="[
            [
                'label' => 'Add Institute',
                'url' => route('institute.new')
            ]
        ]"/>
    </x-slot>

    @if (session('message'))
        <x-alert :message="session('message')" type="success"/>
    @endif

    <table class="w-full">
        <thead>
            <tr>
                <th class="p-2 border-b border-b-gray-200 text-left">Name</th>
                <th class="p-2 border-b border-b-gray-200 text-left">City</th>
                <th class="p-2 border-b border-b-gray-200 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($institutes as $institute)
                <tr>
                    <td class="p-2 border-b border-b-gray-200 text-left">{{$institute->name}}</td>
                    <td class="p-2 border-b border-b-gray-200 text-left">{{$institute->city}}</td>
                    <td class="p-2 border-b border-b-gray-200 text-left">
                        <ul class="flex gap-1">
                            <li>
                                <a href="{{route('institute.single', ['institute' => $institute])}}">
                                    View
                                </a>
                                <a href="{{route('institute.edit', ['institute' => $institute])}}">
                                    Edit
                                </a>
                                <form action="{{route('institute.delete', ['institute' => $institute])}}" method="post" class="contents">
                                    @csrf
                                    @method('DELETE')
                                    <button name="delete">
                                        Delete
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
