<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Form;
use App\Models\FormEntry;
use Tests\TestCase;

class ListFormEntriesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->form = Form::factory()
            ->create([
                'user_id' => $this->user->id,
            ]);
        
        $this->formEntries = FormEntry::factory()
            ->count(5)
            ->create([
                'form_id' => $this->form->id,
            ]);
    }

    public function test_user_can_see_form_entry_list_screen()
    {
        $this->actingAs($this->user)
            ->get(route('form.show', ['id' => $this->form->id]))
            ->assertStatus(200);
    }
    
    public function test_guest_cannot_see_form_entry_list_screen()
    {
        return $this->markTestSkipped();
    }

    public function test_user_can_list_all_their_form_entries()
    {
        return $this->markTestSkipped();
    }

    public function test_user_cannot_list_all_the_form_entries_of_others()
    {
        return $this->markTestSkipped();
    }
}
