<ul class="flex gap-3">
    @foreach ($items as $item)
        @php
            $isActive = $item['route'] === Route::currentRouteName();
        @endphp
        <li class="d-block">
            <a href="{{route($item['route'])}}" @class([
                'd-block',
                'py-3',
                'px-5',
                'uppercase',
                'font-semibold',
                'bg-indigo-600' => $isActive,
                'rounded-lg' => $isActive,
                'text-white' => $isActive
            ])>
                {{$item['label']}}
            </a>
        </li>
    @endforeach
</ul>
