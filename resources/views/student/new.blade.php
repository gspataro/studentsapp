<x-layout>
    <x-slot:title>New Student</x-slot>

    @if ($errors->any())
        {{$errors->first()}}
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif

    <form action="{{route('student.store')}}" method="post">
        @csrf
        <x-input.text name="name" placeholder="Name" value="{{old('name')}}" />
        <x-input.text name="surname" placeholder="Surname" value="{{old('surname')}}" />
        <x-input.text name="city" placeholder="City" value="{{old('city')}}" />
        <x-input.date name="birthday" placeholder="Birthday" value="{{old('birthday')}}" />
        <x-input.button name="create" label="Create Student" />
    </form>
</x-layout>
