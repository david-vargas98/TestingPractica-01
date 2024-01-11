<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker; //This is useful because we need to make fake data in the attributes array
    use RefreshDatabase; //This is useful because after the test this ensures we reset everything back to the initial state
    /**
     * A basic feature test example.
     * @return void
     */
    /** @test */ 
    public function a_user_can_create_a_project(): void
    {
        //An arrray of attributes using faker
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];
        //By making a post request, a project will be created
        $this->post('/projects', $attributes);

        //This makes it to be seen on the database table

        //After I make the request, i'm going to assert that the database has a projects table that include the previous attributes
        $this->assertDatabaseHas('projects', $attributes);
    }
}
