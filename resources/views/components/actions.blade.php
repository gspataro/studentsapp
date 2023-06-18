<ul class="flex gap-3">
    @foreach ($items as $item)
        <li>
            <a href="{{$item['url']}}" class="uppercase font-semibold">
                {{$item['label']}}
            </a>
        </li>
    @endforeach
</ul>
