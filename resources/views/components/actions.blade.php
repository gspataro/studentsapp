<ul class="flex gap-3">
    @foreach ($items as $item)
        <li>
            <a href="{{$item['url']}}" class="border-2 border-gray-300 rounded-lg py-3 px-5 uppercase font-semibold">
                {{$item['label']}}
            </a>
        </li>
    @endforeach
</ul>
