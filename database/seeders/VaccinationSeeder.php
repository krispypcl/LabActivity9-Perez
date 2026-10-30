<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vaccination;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'patient_name' => 'Maria Clara Santos',
                'purok'        => 'Purok 5',
                'vaccine'      => 'BCG',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-01-15',
                'status'       => 'Done',
            ],
            [
                'patient_name' => 'Jose Rizal',
                'purok'        => 'Purok 2',
                'vaccine'      => 'Pentavalent',
                'dose'         => '2nd dose',
                'scheduled_at' => '2026-03-22',
                'status'       => 'Done',
            ],
            [
                'patient_name' => 'Andres Bonifacio',
                'purok'        => 'Purok 1',
                'vaccine'      => 'OPV',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-05-10',
                'status'       => 'Overdue',
            ],
            [
                'patient_name' => 'Melchora Aquino',
                'purok'        => 'Purok 6',
                'vaccine'      => 'MMR',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-07-18',
                'status'       => 'Scheduled',
            ],
            [
                'patient_name' => 'Emilio Aguinaldo',
                'purok'        => 'Purok 4',
                'vaccine'      => 'Anti-Flu',
                'dose'         => 'Annual',
                'scheduled_at' => '2026-10-25',
                'status'       => 'Scheduled',
            ],
            [
                'patient_name' => 'Apolinario Mabini',
                'purok'        => 'Purok 3',
                'vaccine'      => 'Tetanus Toxoid',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-08-01',
                'status'       => 'Overdue',
            ],
            [
                'patient_name' => 'Gabriela Silang',
                'purok'        => 'Purok 7',
                'vaccine'      => 'Tetanus Toxoid',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-09-04', // Your Birthday: Sept 4, 2026
                'status'       => 'Scheduled',
            ],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}