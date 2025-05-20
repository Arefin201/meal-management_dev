@props(['checked' => false, 'value' => ''])

<input type="checkbox" 
    {{ $checked ? 'checked' : '' }}
    {{ $attributes->merge(['class' => 'rounded border-gray-300 text-indigo-600 focus:ring-indigo-500']) }}
    value="{{ $value }}">