<input type="date"
    class="bg-white border-[1px] border-gray-200 rounded-lg py-2 px-3 {{$class ?? ''}}"
    @isset($name)name="{{$name}}"@endisset
    @isset($value)value="{{$value}}"@endisset>
