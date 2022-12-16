<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserVechicle;
use App\Models\Vechicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserVechicleModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function create_user_vechicle(): void
    {
        $user = User::factory()->createOne();

        $vechicle = Vechicle::factory()->create([
            'brand' => 'Honda',
            'model' => 'Civic',
            'version' => 'gasoline',
        ]);

        UserVechicle::factory()->create([
            'user_id' => $user->id,
            'vechicle_id' => $vechicle->id
        ]);

        $this->assertDatabaseCount('user_vechicles', 1);
    }
}
