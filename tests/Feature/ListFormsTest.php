<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListFormsTest extends TestCase
{
    public function test_user_can_see_form_list_screen()
    {
        $response = $this->get('/forms');

        $response->assertStatus(200);
    }

    public function test_guest_cannot_see_form_list_screen()
    {
        $response = $this->get('/forms');

        $response->assertRedirect('/login');
    }

    public function test_user_can_list_all_their_forms()
    {
        
    }

    public function test_user_cannot_list_the_forms_of_others()
    {
        
    }
}
