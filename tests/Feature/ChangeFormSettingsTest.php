<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Form;
use Tests\TestCase;

class ChangeFormSettingsTest extends TestCase
{
    public function test_user_can_see_form_settings_screen()
    {
        return $this->markTestSkipped();
    }
    
    public function test_guest_cannot_see_form_settings_screen()
    {
        return $this->markTestSkipped();
    }

    public function test_user_can_change_form_settings()
    {
        return $this->markTestSkipped();
    }

    public function test_user_cannot_change_the_form_settings_of_others()
    {
        return $this->markTestSkipped();
    }
}
