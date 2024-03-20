@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-brand-blue focus:ring-brand-blue rounded-md shadow-sm']) !!}>{{ $slot }}</textarea>
