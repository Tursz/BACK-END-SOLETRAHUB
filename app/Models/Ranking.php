<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'day_letter_id',
        'points',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dayLetter()
    {
        return $this->belongsTo(DayLetter::class, 'day_letter_id');
    }
}
