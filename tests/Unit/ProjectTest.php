<?php

namespace Tests\Unit;

use App\Models\Project;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase; 
use Tests\TestCase; //This is useful because we need to make fake data in the attributes array

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    /** @test */
    public function it_has_a_path(): void
    {
        $project = Project::factory()->create();

        $this->assertEquals('/projects/' . $project->id, $project->path());
    }
}
