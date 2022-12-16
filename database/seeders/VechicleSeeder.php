<?php

namespace Database\Seeders;

use App\Models\Vechicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VechicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vechicle::create([
            'brand' => 'Honda',
            'model' => 'Civic',
            'version' => 'gasoline',
        ]);
        Vechicle::create([
            'brand' => 'Toyota',
            'model' => 'Corolla',
            'version' => 'gasoline',
        ]);
        Vechicle::create([
            'brand' => 'Fiat',
            'model' => 'Uno',
            'version' => 'gasoline',
        ]);
        Vechicle::create([
            'brand' => 'GM',
            'model' => 'Opala',
            'version' => 'alcohol',
        ]);
    }
}
