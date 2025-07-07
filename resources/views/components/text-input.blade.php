@props(['disabled' => false, 'icon' => null])

<div class="ms-auto position-relative">
    @if ($icon)
        <div class="position-absolute top-50 translate-middle-y search-icon px-3">
            <i class="{{ $icon }}"></i>
        </div>
    @endif
    <input {{ $attributes->merge([
        'class' => 'form-control radius-30 ps-5 ' . ($icon ? '' : 'px-3')
    ]) }} />
</div>


{{-- @props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}> --}}
