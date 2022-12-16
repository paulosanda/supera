<?php

namespace Tests\Feature;

use App\Models\Maintanance;
use App\Models\UserVechicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Vechicle;
use App\Traits\MaintananceTypes;

class MaintananceModelTest extends TestCase
{
    use RefreshDatabase, MaintananceTypes;



    /**
     * @test
     * @return void
     */
    public function createMaintanance(): void
    {
        $user = User::factory()->createOne();

        $this->artisan('db:seed --class=VechicleSeeder');
        $vechicle = Vechicle::inRandomOrder()
            ->limit(1)->get();

        $user_vechicle = UserVechicle::create([
            'user_id' => $user->id,
            'vechicle_id' => $vechicle[0]->id,
        ]);

        $plus = rand(1, 7);
        $date = date('Y-m-d', strtotime("+$plus days"));

        $maintanance = $this->maintanance();
        $key = array_rand($maintanance);

        Maintanance::create([
            'user_id' => $user->id,
            'user_vechicle_id' => $user_vechicle->id,
            'type_maintanance' => $maintanance[$key],
            'next_maintance' => $date,
        ]);

        $this->assertDatabaseCount('maintanances', 1);
    }
}
