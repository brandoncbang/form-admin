<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $casts = [
        'data' => AsArrayObject::class,
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function getASender(): string
    {
        return 'Sender';
        return null;
    }

    public function getASubject(): string
    {
        return 'Lorem ipsum dolor sit amet...';
    }
}
