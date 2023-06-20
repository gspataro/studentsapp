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
        <x-alert :message="$errors->first()" type="error"/>
    @endif

    @if (session('success'))
        <x-alert :message="session('success')" type="success"/>
    @endif

    @php($formAction = match(Route::currentRouteName()) {
        'student.edit' => route('student.update', ['student' => $student]),
        default => route('student.store')
    })

    <form action="{{$formAction}}" method="post">
        @csrf
        <div class="flex gap-2 mb-3">
            <x-input.text name="name" placeholder="Name" value="{{old('name') ?? $student->name ?? ''}}" class="flex-1" />
            <x-input.text name="surname" placeholder="Surname" value="{{old('surname') ?? $student->surname ?? ''}}" class="flex-1" />
        </div>
        <div class="flex gap-2 mb-3">
            <x-input.text name="city" placeholder="City" value="{{old('city') ?? $student->city ?? ''}}" class="flex-1" />
            <x-input.date name="birthday" placeholder="Birthday" value="{{old('birthday') ?? $student->birthday ?? ''}}" class="flex-1" />
        </div>
        <div class="mb-3">
            <x-input.select name="institute" :items="$institutes" class="w-full" selected="{{old('institute') ?? $student->institute->id ?? ''}}" />
        </div>

        @if (Route::currentRouteName() === 'student.edit')
            <x-input.button name="update" label="Update Student" />
        @else
            <x-input.button name="create" label="Create Student" />
        @endif
    </form>
</x-layout>
