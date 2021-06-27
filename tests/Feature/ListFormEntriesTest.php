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
            ->get(route('form.show', ['id' => $this->form->id]))
            ->assertStatus(200);
    }
    
    public function test_guest_cannot_see_form_entry_list_screen()
    {
        $this->get(route('form.show', ['id' => $this->form->id]))
            ->assertRedirect('/login');
    }

    public function test_user_can_list_all_their_form_entries()
    {
        $this->actingAs($this->user)
            ->get(route('form.show', ['id' => $this->form->id]))
            ->assertInertia(
                fn (Assert $assert) => $assert
                    ->component('Form/Show')
                    ->has('form_entries.data', 5)
                    ->has('form_entries.data.0', fn (Assert $assert) => $assert
                        ->where('id', $this->formEntries[0]->id)
                        ->where('is_spam', $this->formEntries[0]->is_spam)
                        ->where('ip_address', $this->formEntries[0]->ip_address)
                        ->where('user_agent', $this->formEntries[0]->user_agent)
                        ->has('form_entry_fields', 5)
                        ->has('form_entry_fields.0', fn (Assert $assert) => $assert
                            ->where('id', $this->formEntryFields[0]->id)
                            ->where('name', $this->formEntryFields[0]->name)
                            ->where('value', $this->formEntryFields[0]->value)
                        )
                        ->has('form_entry_fields.1', fn (Assert $assert) => $assert
                            ->where('id', $this->formEntryFields[1]->id)
                            ->where('name', $this->formEntryFields[1]->name)
                            ->where('value', $this->formEntryFields[1]->value)
                        )
                        ->has('form_entry_fields.2', fn (Assert $assert) => $assert
                            ->where('id', $this->formEntryFields[2]->id)
                            ->where('name', $this->formEntryFields[2]->name)
                            ->where('value', $this->formEntryFields[2]->value)
                        )
                        ->has('form_entry_fields.3', fn (Assert $assert) => $assert
                            ->where('id', $this->formEntryFields[3]->id)
                            ->where('name', $this->formEntryFields[3]->name)
                            ->where('value', $this->formEntryFields[3]->value)
                        )
                        ->has('form_entry_fields.4', fn (Assert $assert) => $assert
                            ->where('id', $this->formEntryFields[4]->id)
                            ->where('name', $this->formEntryFields[4]->name)
                            ->where('value', $this->formEntryFields[4]->value)
                        )
                    )
            );
    }

    public function test_user_cannot_list_all_the_form_entries_of_others()
    {
        return $this->markTestSkipped();
    }
}
