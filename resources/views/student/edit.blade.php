<x-layout>
    <x-slot:title>Update Student</x-slot>

    @if ($errors->any())
        {{$errors->first()}}
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif

    <form action="{{route('student.update', ['student' => $student])}}" method="post">
        @csrf
        <x-input.text name="name" placeholder="Name" value="{{old('name') ?? $student->name}}" />
        <x-input.text name="surname" placeholder="Surname" value="{{old('surname') ?? $student->surname}}" />
        <x-input.text name="city" placeholder="City" value="{{old('city') ?? $student->city}}" />
        <x-input.date name="birthday" placeholder="Birthday" value="{{old('birthday') ?? $student->birthday}}" />
        <x-input.button name="update" label="Update Student" />
    </form>
</x-layout>
