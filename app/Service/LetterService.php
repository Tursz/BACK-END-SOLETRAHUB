<?php

namespace App\Service;

use App\Models\DayLetter;
use Illuminate\Support\Str;

class LetterService
{
    public function randLetter($date)
    {
        $letterVogal_1 = substr(str_shuffle('aeiou'), 0,1);
        $letterVogal_2 = substr(str_shuffle('aeiou'), 0,1);
        $letterVogal_3 = substr(str_shuffle('aeiou'), 0,1);
        $letter_4 = substr(str_shuffle('bcdfghjlmnpqrtsv'), 0,1);
        $letter_5 = substr(str_shuffle('bcdfghjlmnpqrtsv'), 0,1);
        $letter_6 = substr(str_shuffle('bcdfghjlmnpqrtsv'), 0,1);
        $letter_7 = substr(str_shuffle('bcdfghjlmnpqrtsv'), 0,1);
        while ($letterVogal_1 == $letterVogal_2 || $letterVogal_1==$letterVogal_3 || $letterVogal_2==$letterVogal_3){
            $letterVogal_1 = substr(str_shuffle('aeiou'), 0,1);
            $letterVogal_2 = substr(str_shuffle('aeiou'), 0,1);
            $letterVogal_3 = substr(str_shuffle('aeiou'), 0,1);
        }
        while ($letter_4 == $letter_5 || $letter_4 == $letter_6 || $letter_4 == $letter_7 || $letter_5 == $letter_6 || $letter_5 == $letter_7 || $letter_6==$letter_7){
            $letter_4 = substr(str_shuffle('bcdfghjlmnpqrtsv'), 0,1);
            $letter_5 = substr(str_shuffle('bcdfghjlmnpqrtsv'), 0,1);
            $letter_6 = substr(str_shuffle('bcdfghjlmnpqrtsv'), 0,1);
            $letter_7 = substr(str_shuffle('bcdfghjlmnpqrtsv'), 0,1);
        }
        return DayLetter::create([
            'letter_1' => $letterVogal_1,
            'letter_2' => $letterVogal_2,
            'letter_3' => $letterVogal_3,
            'letter_4' => $letter_4,
            'letter_5' => $letter_5,
            'letter_6' => $letter_6,
            'letter_7' => $letter_7,
            'date' => $date,
        ]);
    }
}
