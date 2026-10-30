<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccination;

class DashboardController extends Controller
{
    public function index()
    {
        // Lab Requirement: "Bakuna Tracker - Purok [your last name]"
        $title = 'Bakuna Tracker - Purok Perez';

        // Fetch schedules ordered by scheduled date
        $schedules = Vaccination::orderBy('scheduled_at')->get();

        // Lab Requirement: 4 stats counts
        $stats = [
            ['label' => 'Total', 'value' => $schedules->count()],
            ['label' => 'Done', 'value' => $schedules->where('status', 'Done')->count()],
            ['label' => 'Scheduled', 'value' => $schedules->where('status', 'Scheduled')->count()],
            ['label' => 'Overdue', 'value' => $schedules->where('status', 'Overdue')->count()],
        ];

        // Alerts for overdue vaccinations
        $alerts = $schedules->where('status', 'Overdue');

        return view('dashboard.index', compact('title', 'stats', 'schedules', 'alerts'));
    }

    public function schedule()
    {
        $title = 'Vaccination Schedule – Purok Perez';
        $schedules = Vaccination::orderBy('scheduled_at')->get();
        return view('schedule.index', compact('title', 'schedules'));
    }
}
