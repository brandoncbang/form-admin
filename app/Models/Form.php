<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    public function resolveRouteBinding($value, $field = null)
    {
        return Auth::user()->forms()->findOrFail($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entries()
    {
        return $this->hasMany(FormEntry::class);
    }
}
