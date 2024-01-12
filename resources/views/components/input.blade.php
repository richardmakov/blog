@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-blue-700 focus:ring-blue-700rounded-md shadow-sm']) !!}>
