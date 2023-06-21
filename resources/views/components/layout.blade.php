<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{isset($title) ? $title . ' - StudentsApp' : 'StudentsApp'}}</title>
        @vite('resources/css/app.css')
        {{$styles ?? ''}}
    </head>

    <body class="bg-gray-300 text-black">
        <div class="container max-w-4xl mx-auto my-12">
            <div class="bg-white border-b-gray-200 flex border-b-[1px] rounded-t-lg p-5">
                <div class="flex-1">
                    <x-navbar :items="[
                        [
                            'label' => 'Students',
                            'route' => 'student.list'
                        ],
                        [
                            'label' => 'Institutes',
                            'route' => 'institute.list'
                        ]
                    ]"/>
                </div>
                @isset($actions)
                    {{$actions}}
                @endisset
            </div>
            <div class="bg-white rounded-b-lg p-5">
                {{$slot}}
            </div>
        </div>
        {{$scripts ?? ''}}
    </body>
</html>
