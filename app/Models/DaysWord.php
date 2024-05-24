<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaysWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'word_1',
        'word_2',
        'word_3',
        'word_4',
        'word_5',
        'word_6',
        'word_7',
    ];
}
