<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function show()
    {
        
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
