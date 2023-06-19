<div @class([
    'py-2',
    'px-3',
    'mb-3',
    'rounded-lg',
    'border-2',
    'font-semibold',
    'text-red-600' => $type == 'error',
    'border-red-600' => $type == 'error',
    'text-green-600' => $type == 'success',
    'border-green-600' => $type == 'success'
])>
    {{$message}}
</div>
