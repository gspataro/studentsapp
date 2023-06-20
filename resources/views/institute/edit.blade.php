<x-layout>
    <x-slot:title>
        @switch (Route::currentRouteName())
            @case ('institute.edit')
                Update Institute
                @break
            @default
                Add Institute
        @endswitch
    </x-slot>

    @if ($errors->any())
        <x-alert :message="$errors->first()" type="error"/>
    @endif

    @if (session('success'))
        <x-alert :message="session('success')" type="success"/>
    @endif

    <form action="{{route('institute.store', ['institute' => $institute])}}" method="post">
        @csrf
        <div class="flex gap-2 mb-3">
            <x-input.text name="name" placeholder="Name" value="{{old('name') ?? $institute->name ?? ''}}" class="flex-1" />
            <x-input.text name="city" placeholder="City" value="{{old('city') ?? $institute->city ?? ''}}" class="flex-1" />
        </div>

        @if (Route::currentRouteName() === 'institute.edit')
            <x-input.button name="update" label="Update Institute" />
        @else
            <x-input.button name="create" label="Add Institute" />
        @endif
    </form>
</x-layout>
