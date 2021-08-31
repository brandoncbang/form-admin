<?php

namespace Tests\Feature;

use App\Models\Form;
use App\Models\FormEntry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowFormEntryTest extends TestCase
{
    use refreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user_a = User::factory()->create();
        $this->user_b = User::factory()->create();

        $this->form = Form::factory()
            ->create([
                'user_id' => $this->user_a->id,
            ]);

        $this->formEntry = FormEntry::factory()
            ->count(5)
            ->create([
                'form_id' => $this->form->id,
                'data' => [
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'johndoe@example.com',
                    'subject' => 'Hello, World!',
                    'message' => 'Lorem ipsum dolor sit amet',
                ],
            ]);
    }

    public function test_user_can_get_form_entry() {
        $this->actingAs($this->user_a)
            ->get(route('form.entry.show', ['entry' => $this->formEntry]))
            ->assertJson($this->formEntry->data);
    }

    public function test_guest_cannot_get_form_entry()
    {
        $this->get(route('form.entry.show', ['form' => $this->form, 'entry' => $this->formEntry]))
            ->assertStatus(404);
    }

    public function test_user_cannot_get_the_form_entry_of_others()
    {
        $this->actingAs($this->user_b)
            ->get(route('form.entry.show', ['form' => $this->form, 'entry' => $this->formEntry]))
            ->assertStatus(404);
    }
}
