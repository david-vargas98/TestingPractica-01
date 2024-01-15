<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
     /** @test */
    public function a_user_has_projects(): void
    {
        //Create a brand new user instead of the authenticated user
        $user = User::factory()->create();
        //This is a relationship between the user and the project
        $this->assertInstanceOf(Collection::class, $user->projects);
    }
}
