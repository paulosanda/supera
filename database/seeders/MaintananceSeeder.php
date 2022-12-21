<?php

namespace Database\Seeders;

use App\Models\Maintanance;
use App\Models\User;
use App\Models\UserVechicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\MaintananceTypes;

class MaintananceSeeder extends Seeder
{
    use MaintananceTypes;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $userVechicles = UserVechicle::all();

        foreach ($userVechicles as $uv) {
            $maintanance = $this->maintanancetypes();
            $key = array_rand($maintanance);

            $plus = rand(1, 7);
            $date = date('Y-m-d', strtotime("+$plus days"));

            Maintanance::create([
                'user_id' => $user->id,
                'user_vechicle_id' => $uv->id,
                'vechicle_id' => $uv->vechicle_id,
                'type_maintanance' => $maintanance[$key],
                'next_maintanance' => $date,
            ]);
        }
    }
}
