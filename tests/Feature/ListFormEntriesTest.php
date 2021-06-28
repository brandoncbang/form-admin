<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Form;
use App\Models\FormEntry;
use App\Models\FormEntryField;
use Tests\TestCase;
use Inertia\Testing\Assert;

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
        
        $this->formEntryFields = FormEntryField::factory()
            ->count(5)
            ->create([
                'form_entry_id' => $this->formEntries[0]->id,
            ]);
    }

    public function test_user_can_see_form_entry_list_screen()
    {
        $this->actingAs($this->user)
            ->get(route('form.show', ['form' => $this->form]))
            ->assertStatus(200);
    }
    
    public function test_guest_cannot_see_form_entry_list_screen()
    {
        $this->get(route('form.show', ['form' => $this->form]))
            ->assertRedirect('/login');
    }

    public function test_user_can_list_all_their_form_entries()
    {
        $this->actingAs($this->user)
            ->get(route('form.show', ['form' => $this->form]))
            ->assertInertia(
                fn (Assert $assert) => $assert
                    ->component('Form/Show')
                    ->has('entries.data', 5)
                    ->has('entries.data.0', fn (Assert $assert) => $assert
                        ->where('id', $this->formEntries[0]->id)
                        ->where('sender', $this->formEntries[0]->getASender())
                        ->where('subject', $this->formEntries[0]->getASubject())
                    )
            );
    }

    public function test_user_cannot_list_all_the_form_entries_of_others()
    {
        return $this->markTestSkipped();
    }
}
