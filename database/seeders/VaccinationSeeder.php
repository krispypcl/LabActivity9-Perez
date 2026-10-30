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
                'purok'        => 'Purok Pag-asa',
                'vaccine'      => 'BCG',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-02-10',
                'status'       => 'Done',
            ],
            [
                'patient_name' => 'Jose Rizal',
                'purok'        => 'Purok San Miguel',
                'vaccine'      => 'Pentavalent',
                'dose'         => '2nd dose',
                'scheduled_at' => '2026-04-18',
                'status'       => 'Done',
            ],
            [
                'patient_name' => 'Gabriela Silang',
                'purok'        => 'Purok Bayanihan',
                'vaccine'      => 'Tetanus Toxoid',
                'dose'         => 'Booster',
                'scheduled_at' => '2026-09-04', // Birthday: Sept 4, 2026
                'status'       => 'Done',
            ],
            [
                'patient_name' => 'Andres Bonifacio',
                'purok'        => 'Purok Malipayon',
                'vaccine'      => 'OPV',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-08-15',
                'status'       => 'Overdue',
            ],
            [
                'patient_name' => 'Apolinario Mabini',
                'purok'        => 'Purok Maharlika',
                'vaccine'      => 'Anti-Flu',
                'dose'         => 'Annual',
                'scheduled_at' => '2026-10-20',
                'status'       => 'Overdue',
            ],
            [
                'patient_name' => 'Melchora Aquino',
                'purok'        => 'Purok Sto. Niño',
                'vaccine'      => 'MMR',
                'dose'         => '1st dose',
                'scheduled_at' => '2026-11-05',
                'status'       => 'Scheduled',
            ],
            [
                'patient_name' => 'Emilio Aguinaldo',
                'purok'        => 'Purok Kawayan',
                'vaccine'      => 'Anti-Flu',
                'dose'         => 'Annual',
                'scheduled_at' => '2026-11-18',
                'status'       => 'Scheduled',
            ],
            [
                'patient_name' => 'Juan Luna',
                'purok'        => 'Purok Rosal',
                'vaccine'      => 'BCG',
                'dose'         => 'Booster',
                'scheduled_at' => '2026-12-02',
                'status'       => 'Scheduled',
            ],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
