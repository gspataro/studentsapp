<input type="text"
    class="bg-white border-[1px] border-gray-200 rounded-lg py-2 px-3"
    @isset($name)name="{{$name}}"@endisset
    @isset($placeholder)placeholder="{{$placeholder}}"@endisset
    @isset($value)value="{{$value}}"@endisset>
