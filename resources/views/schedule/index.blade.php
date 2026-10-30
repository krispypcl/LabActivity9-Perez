@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">{{ $title }}</h1>
            <p class="text-sm text-gray-500 mt-1">Barangay Matina Crossing Health Center &bull; Full Vaccination Roster</p>
        </div>
        <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-700 underline">
            &larr; Back to Dashboard
        </a>
    </div>

    <x-panel title="Detailed Schedule List">
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
                    @forelse ($schedules as $schedule)
                        <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-50' }} hover:bg-emerald-50/40 transition">
                            <td class="px-4 py-3.5 text-gray-500 font-mono text-xs">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3.5 font-semibold text-gray-900">{{ $schedule->patient_name }}</td>
                            <td class="px-4 py-3.5 text-gray-600">{{ $schedule->purok }}</td>
                            <td class="px-4 py-3.5 font-medium text-emerald-700">{{ $schedule->vaccine }}</td>
                            <td class="px-4 py-3.5 text-gray-600">{{ $schedule->dose }}</td>
                            <td class="px-4 py-3.5 text-gray-600">{{ $schedule->scheduled_at->format('M d, Y') }}</td>
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
