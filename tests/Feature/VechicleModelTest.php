<?php

namespace Tests\Feature;

use App\Models\Vechicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VechicleModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function create_vechicle(): void
    {
        Vechicle::factory()->createOne([
            'brand' => 'Honda',
            'model' => 'Civic',
            'version' => 'gasoline',
        ]);

        $this->assertDatabaseCount('vechicles', 1);
    }
}
