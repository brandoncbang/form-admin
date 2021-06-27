<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEntryField extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];

    public function formEntry()
    {
        return $this->belongsTo(FormEntry::class);
    }
}
