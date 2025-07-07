@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <span class="text-danger small d-block mt-1">{{ $message }}</span>
    @endforeach
@endif


{{-- @props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif --}}
