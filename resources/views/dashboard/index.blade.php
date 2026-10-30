@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">{{ $title }}</h1>
            <p class="text-sm text-gray-500 mt-1">Barangay Matina Crossing Health Center &bull; Vaccination Desk Overview</p>
        </div>
        <div class="inline-flex items-center gap-2 text-xs font-medium text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-full w-fit">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
            System Live &bull; Davao City Health Office
        </div>
    </div>

    {{-- Alert Banner (@if / @elseif / @else requirement) --}}
    @if ($alerts->count() > 0)
        <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 flex items-start sm:items-center justify-between gap-3 shadow-sm">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <div class="text-sm">
                    <span class="font-bold">Attention Needed:</span>
                    <span>There are {{ $alerts->count() }} overdue resident vaccination(s) requiring immediate follow-up.</span>
                </div>
            </div>
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-red-200 text-red-900 uppercase tracking-wide">
                {{ $alerts->count() }} Overdue
            </span>
        </div>
    @elseif ($schedules->isEmpty())
        <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 flex items-center gap-3 shadow-sm">
            <svg class="w-5 h-5 text-amber-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="text-sm">
                <span class="font-bold">Special Notice:</span>
                <span>Vaccine supply is awaiting restocking and no appointments are currently registered.</span>
            </div>
        </div>
    @else
        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center gap-3 shadow-sm">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div class="text-sm">
                <span class="font-bold">All clear:</span>
                <span>All scheduled vaccinations for Purok residents are up to date.</span>
            </div>
        </div>
    @endif

    <!-- Stat Cards Grid (Tailwind responsive grid + component loop requirement) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        @foreach ($stats as $stat)
            <x-stat-card :title="$stat['label']" :value="$stat['value']" />
        @endforeach
    </div>

    <!-- Slotted Panel wrapping schedule table -->
    <x-panel title="Vaccination Master Schedule">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-gray-50 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Patient Name</th>
                        <th class="px-4 py-3">Purok</th>
                        <th class="px-4 py-3">Vaccine</th>
                        <th class="px-4 py-3">Dose</th>
                        <th class="px-4 py-3">Scheduled Date</th>
                        <th class="px-4 py-3 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm">
                    {{-- @forelse with $loop requirement --}}
                    @forelse ($schedules as $schedule)
                        <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} hover:bg-emerald-50/40 transition">
                            <td class="px-4 py-3.5 text-gray-500 font-mono text-xs">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-4 py-3.5 font-semibold text-gray-900">
                                {{ $schedule->patient_name }}
                                @if ($loop->first)
                                    <span class="ml-1.5 inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-800 uppercase tracking-wide">
                                        Next Up
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3.5 text-gray-600">
                                {{ $schedule->purok }}
                            </td>
                            <td class="px-4 py-3.5 font-medium text-emerald-700">
                                {{ $schedule->vaccine }}
                            </td>
                            <td class="px-4 py-3.5 text-gray-600">
                                {{ $schedule->dose }}
                            </td>
                            <td class="px-4 py-3.5 text-gray-600">
                                {{ $schedule->scheduled_at->format('M d, Y') }}
                            </td>
                            <td class="px-4 py-3.5 text-center">
                                @if ($schedule->status === 'Done')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                        Done
                                    </span>
                                @elseif ($schedule->status === 'Scheduled')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                        Scheduled
                                    </span>
                                @endif

                                {{-- @unless directive requirement (hide Overdue badge unless a row is overdue) --}}
                                @unless ($schedule->status !== 'Overdue')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                        Overdue
                                    </span>
                                @endunless
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-10 text-center text-gray-500 text-sm">
                                No schedules yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>

</div>
@endsection
