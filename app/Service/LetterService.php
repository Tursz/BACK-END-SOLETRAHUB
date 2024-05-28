<?php

namespace App\Service;

use App\Models\DayLetter;

class LetterService
{
    private $letterVogal = ['a', 'e', 'i', 'o', 'u'];
    private $letters_2 = ['b', 'c', 't'];
    private $letters_3 = ['q', 'g', 'r'];
    private $letters_4 = ['j','k','l','x'];
    private $letters_5 = ['m','n','f'];
    private $letters_6 = ['p','h','z'];
    private $letters_7 = ['d','v','s'];
    public function randLetter($date)
    {
        return DayLetter::create([
            'letter_1' => $this->letterVogal[rand(0,4)],
            'letter_2' => $this->letters_2[rand(0,2)],
            'letter_3' => $this->letters_3[rand(0,2)],
            'letter_4' => $this->letters_4[rand(0,2)],
            'letter_5' => $this->letters_5[rand(0,2)],
            'letter_6' => $this->letters_6[rand(0,2)],
            'letter_7' => $this->letters_7[rand(0,2)],
            'date' => $date
        ]);
    }
}
