<?php

namespace Database\Seeders;

use App\Models\DayLetter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DayLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->random();
    }

    public function random()
    {
        $date = date('Y-m-d');
        for($i=1;$i<=40;$i++){
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
            if($letter_4 == 'q' || $letter_5 == 'q' || $letter_6 == 'q' || $letter_7 =='q'){
                if($letterVogal_1 != 'u' || $letterVogal_2 != 'u' || $letterVogal_3 != 'u'){
                    $letterVogal_2 = 'u';
                }
            }
            DayLetter::create([
                'letter_1' => $letterVogal_1,
                'letter_2' => $letterVogal_2,
                'letter_3' => $letterVogal_3,
                'letter_4' => $letter_4,
                'letter_5' => $letter_5,
                'letter_6' => $letter_6,
                'letter_7' => $letter_7,
                'date' => $date,
            ]);
            $date = date('Y-m-d', strtotime("+$i days"));
        }       

    }
}
