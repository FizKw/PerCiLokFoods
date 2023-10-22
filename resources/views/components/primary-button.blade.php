<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-color3 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-orange-200 focus:bg-orange-100 active:bg-orange-100  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
