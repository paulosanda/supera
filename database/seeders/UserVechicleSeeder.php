<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserVechicle;
use App\Models\Vechicle;

class UserVechicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $vechicles = Vechicle::all();
        foreach ($vechicles as $vechicle) {
            UserVechicle::create([
                'user_id' => $user->id,
                'vechicle_id' => $vechicle->id,
            ]);
        }
    }
}
