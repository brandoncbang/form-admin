<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Form;
use Tests\TestCase;
use Inertia\Testing\Assert;

class ListFormsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->forms = Form::factory()
            ->count(5)
            ->create([
                'user_id' => $this->user->id,
            ]);
    }

    public function test_user_can_see_form_list_screen()
    {
        $this->actingAs($this->user)
            ->get('/forms')
            ->assertStatus(200);
    }

    public function test_guest_cannot_see_form_list_screen()
    {
        $this->get('/forms')
            ->assertRedirect('/login');
    }

    public function test_user_can_list_all_their_forms()
    {
        $this->actingAs($this->user)
            ->get('/forms')
            ->assertInertia(
                fn (Assert $assert) => $assert
                    ->has('forms', 5)
                    ->has('forms.0', fn (Assert $assert) => $assert
                        ->where('id', $this->forms[0]->id)
                        ->where('name', $this->forms[0]->name)
                    )
                    ->has('forms.1', fn (Assert $assert) => $assert
                        ->where('id', $this->forms[1]->id)
                        ->where('name', $this->forms[1]->name)
                    )
                    ->has('forms.2', fn (Assert $assert) => $assert
                        ->where('id', $this->forms[2]->id)
                        ->where('name', $this->forms[2]->name)
                    )
                    ->has('forms.3', fn (Assert $assert) => $assert
                        ->where('id', $this->forms[3]->id)
                        ->where('name', $this->forms[3]->name)
                    )
                    ->has('forms.4', fn (Assert $assert) => $assert
                        ->where('id', $this->forms[4]->id)
                        ->where('name', $this->forms[4]->name)
                    )
            );
    }

    public function test_user_cannot_list_the_forms_of_others()
    {
        $other_user = User::factory()->create();
        
        $this->actingAs($other_user)
            ->get('/forms')
            ->assertInertia(
                fn (Assert $assert) => $assert
                    ->has('forms', 0)
            );
    }
}
