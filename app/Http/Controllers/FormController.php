<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FormController extends Controller
{
    public function index()
    {
        return Inertia::render('Form/Index', [
            'forms' => Auth::user()->forms()
                ->paginate(10),
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
