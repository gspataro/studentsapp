<select name="{{$name}}" class="bg-white border-[1px] border-gray-200 rounded-lg py-2 px-3 {{$class ?? ''}}">
    @if (isset($items))
        @foreach ($items as $item)
            <option value="{{$item['value']}}" {{isset($selected) && $item['value'] == $selected ? 'selected' : ''}}>{{$item['label']}}</option>
        @endforeach
    @endif
</select>
