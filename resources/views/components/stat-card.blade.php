@props(['title', 'value'])

<div class="bg-white p-5 rounded-xl border border-gray-100 shadow-sm transition hover:shadow-md">
    <dt class="text-xs font-semibold uppercase tracking-wider text-gray-500">{{ $title }}</dt>
    <dd class="mt-2 text-3xl font-extrabold text-emerald-600">{{ $value }}</dd>
</div>

