<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PharmaceuticalForm;

class PharmaceuticalFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PharmaceuticalForm::create([
            'name' => 'Capsula',
        ]);
        PharmaceuticalForm::create([
            'name' => 'Tableta',
        ]);
        PharmaceuticalForm::create([
            'name' => 'Inyectable',
        ]);
        PharmaceuticalForm::create([
            'name' => 'Polvo',
        ]);
        PharmaceuticalForm::create([
            'name' => 'Granulado',
        ]);
        PharmaceuticalForm::create([
            'name' => 'Solucion',
        ]);
        PharmaceuticalForm::create([
            'name' => 'Suspension',
        ]);
        PharmaceuticalForm::create([
            'name' => 'Gotas',
        ]);
    }
}
