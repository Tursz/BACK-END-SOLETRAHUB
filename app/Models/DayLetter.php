<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'letter_1',
        'letter_2',
        'letter_3',
        'letter_4',
        'letter_5',
        'letter_6',
        'letter_7',
        'letter_8',
    ];
}
