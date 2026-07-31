@props([
    'type' => 'button'
])

<button type="{{$type}}" class="bg-blue-500 text-white rounded px-4 py-2  hover:bg-blue-600">
    {{$slot}}
</button>