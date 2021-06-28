<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function fields()
    {
        return $this->hasMany(FormEntryField::class);
    }

    public function getASender(): string
    {
        return 'Sender';
        return null;
    }

    public function getASubject(): string
    {
        return $this->fields()->first()->value ?? 'No fields';
    }
}
