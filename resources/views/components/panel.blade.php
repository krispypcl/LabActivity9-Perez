@props(['title' => ''])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden']) }}>
    @if ($title)
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/75 flex items-center justify-between">
            <h3 class="text-base font-semibold text-gray-800">{{ $title }}</h3>
        </div>
    @endif
    <div class="p-6">
        {{ $slot }}
    </div>
</div>
