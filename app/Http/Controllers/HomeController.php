<?php

namespace App\Http\Controllers;

use App\Models\DayLetter;
use App\Models\Word;
use App\Service\LetterService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!$date = $request->date){
            $date = date('Y-m-d');
        }
        if(!$dayLetters = DayLetter::whereDate('date', '=', $date)->first()){
            $letterService = new LetterService;
            $dayLetters = $letterService->randLetter($date);
        }
        // $dayLetters = DayLetter::whereDate('created_at', '=', $date)->first();
        $letters = $dayLetters->letter_1 . $dayLetters->letter_2 . $dayLetters->letter_3 . $dayLetters->letter_4 . $dayLetters->letter_5. $dayLetters->letter_6 . $dayLetters->letter_7;
        $pattern = "^[$letters]+$dayLetters->letter_1[$letters]*$";

        $words = Word::where('word', 'REGEXP', $pattern)->get();

        return response()->json($words, Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
