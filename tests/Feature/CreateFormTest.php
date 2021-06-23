<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class CreateFormTest extends TestCase
{
    public function test_user_can_see_form_creation_screen()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/forms/create');

        $response->assertStatus(200);
    }

    public function test_guest_cannot_see_form_creation_screen()
    {
        $response = $this->get('/forms/create');

        $response->assertRedirect('/login');
    }

    public function test_user_can_create_a_new_form()
    {
        
    }
}
