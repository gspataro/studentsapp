<button
    @isset($type)type="{{$type}}"@endisset
    @isset($name)name="{{$name}}"@endisset
    {{$attributes->merge(['class' => 'bg-indigo-600 py-2 px-3 rounded-lg text-white uppercase font-semibold'])}}>
    {{$label}}
</button>
