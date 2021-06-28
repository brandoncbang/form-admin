<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormEntry;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $forms = Auth::user()->forms()->paginate(15);

        if ($request->wantsJson()) {
            return $forms;
        }

        return Inertia::render('Form/Index', [
            'forms' => $forms,
        ]);
    }

    public function create()
    {
        
    }

    public function store()
    {
        
    }

    public function show(Form $form)
    {
        return Inertia::render('Form/Show', [
            'form' => [
                'id' => $form->id,
                'name' => $form->name,
            ],
            'entries' => $form->entries()
                ->paginate(15)
                ->through(fn (FormEntry $entry) => [
                    'id' => $entry->id,
                    'sender' => $entry->getASender(),
                    'subject' => $entry->getASubject(),
                ]),
        ]);
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
