@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700  outline:none border-transparent']) }}>
    {{ $value ?? $slot }}
</label>
