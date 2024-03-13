<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-brand-blue border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest']) }}>
    {{ $slot }}
</button>
