<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Form;
use App\Models\FormEntry;
use Tests\TestCase;

class CreateFormEntryTest extends TestCase
{
    public function test_form_can_receive_post_request_to_its_endpoint()
    {
        $user = User::factory()->create();
        $form = Form::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->post("/f/{$form->endpoint}");

        $response->assertStatus(200);
    }

    public function test_form_creates_new_entry_from_post_data()
    {
        
    }

    public function test_form_redirects_when_success_url_is_set()
    {
        
    }
}
