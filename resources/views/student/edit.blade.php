<x-layout>
    <x-slot:title>
        @switch (Route::currentRouteName())
            @case ('student.edit')
                Update Student
                @break
            @default
                Create Student
        @endswitch
    </x-slot>

    @if ($errors->any())
        {{$errors->first()}}
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif

    @php($formAction = match(Route::currentRouteName()) {
        'student.edit' => route('student.update', ['student' => $student]),
        default => route('student.store')
    })

    <form action="{{$formAction}}" method="post">
        @csrf
        <x-input.text name="name" placeholder="Name" value="{{old('name') ?? $student->name ?? ''}}" />
        <x-input.text name="surname" placeholder="Surname" value="{{old('surname') ?? $student->surname ?? ''}}" />
        <x-input.text name="city" placeholder="City" value="{{old('city') ?? $student->city ?? ''}}" />
        <x-input.date name="birthday" placeholder="Birthday" value="{{old('birthday') ?? $student->birthday ?? ''}}" />

        @if (Route::currentRouteName() === 'student.edit')
            <x-input.button name="update" label="Update Student" />
        @else
            <x-input.button name="create" label="Create Student" />
        @endif
    </form>
</x-layout>
