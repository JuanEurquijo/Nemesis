<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialty;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            'Cardiología',
            'Dermatología',
            'Endocrinología',
            'Gastroenterología',
            'Hematología',
            'Infectología',
            'Medicina Familiar',
            'Neumología',
            'Neurología',
            'Obstetricia y Ginecología',
            'Oftalmología',
            'Oncología',
            'Ortopedia',
            'Otorrinolaringología',
            'Pediatría',
            'Psiquiatría',
            'Radiología',
            'Traumatología',
            'Urología'
          ];
        foreach ($specialties as $specialty) {
            Specialty::create(['name' => $specialty]);
        }
    }
}
