<input type="text"
    @isset($name)name="{{$name}}"@endisset
    @isset($placeholder)placeholder="{{$placeholder}}"@endisset
    @isset($value)value="{{$value}}"@endisset
    {{$attributes->merge(['class' => 'bg-white border border-gray-200 rounded-lg py-2 px-3'])}}>
