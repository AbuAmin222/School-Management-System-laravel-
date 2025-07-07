@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label fw-semibold text-dark']) }}>
    {{ $value ?? $slot }}
</label>


{{-- @props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label> --}}
