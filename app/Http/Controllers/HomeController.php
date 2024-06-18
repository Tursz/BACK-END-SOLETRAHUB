<?php

namespace App\Http\Controllers;

use App\Models\DayLetter;
use App\Models\Ranking;
use App\Models\Word;
use App\Service\LetterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Mostra as letras do dia junto com as palavras que
     * correspondem com as mesmas, caso não exista cria novas letras para aquele dia.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if (!$date = $request->date) {
            $date = date('Y-m-d');
        }
        if (!$dayLetters = DayLetter::whereDate('date', '=', $date)->first()) {
            $letterService = new LetterService;
            $dayLetters = $letterService->randLetter($date);
        }

        $letra = 'letter_' . rand(1, 7);

        $letters = $dayLetters->letter_1 . $dayLetters->letter_2 . $dayLetters->letter_3 . $dayLetters->letter_4 . $dayLetters->letter_5 . $dayLetters->letter_6 . $dayLetters->letter_7;
        $pattern = "^[$letters]+$dayLetters->letter_1[$letters]*$";

        $words = Word::where('word', 'REGEXP', $pattern)->get();

        $countLetter = array();
        foreach ($words as $word) {
            $countLetter[]= [strlen($word->word),$word->id];
        }


        return response()->json([
            $dayLetters,
            $countLetter,
        ], Response::HTTP_OK);
    }


    /**
     * Verifica se a palavra enviada pelo usuário é correta ou não.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (!$request->date) {
            $date = date('Y-m-d');
        }
        $dayLetters = DayLetter::whereDate('date', '=', $date)->first();
        $letters = $dayLetters->letter_1 . $dayLetters->letter_2 . $dayLetters->letter_3 . $dayLetters->letter_4 . $dayLetters->letter_5 . $dayLetters->letter_6 . $dayLetters->letter_7;
        $pattern = "^[$letters]+$dayLetters->letter_1[$letters]*$";
        $answer = true;
        $words = Word::where('word', 'REGEXP', $pattern)->where('word', $request->answer)->first();
        if (!$words) {
            $answer = false;
            return response()->json($answer, Response::HTTP_OK);
        }
        return response()->json([$answer, $words->id, $words->word], Response::HTTP_OK);
    }

    /**
     * Grava a quantidade de pontos feita pelo usuário.
     * @return \Illuminate\Http\JsonResponse
     */
    public function score(Request $request, $points)
    {
        $user = $request->user();
        if(!$request->date){
            $date=date('Y-m-d');
        }
        $dayLetters = DayLetter::whereDate('date',$date)->first();
        Ranking::create([
            'user_id' => $user->id,
            'day_letter_id' => $dayLetters->id,
            'points' => $points,
        ]);
        return response()->json($points, Response::HTTP_OK);
    }

    public function answer(Request $request)
    {
        if(!$request->date){
            $date = date('Y-m-d');
        }
        $dayLetters = DayLetter::whereDate('date', '=', $date)->first();
        $letters = $dayLetters->letter_1 . $dayLetters->letter_2 . $dayLetters->letter_3 . $dayLetters->letter_4 . $dayLetters->letter_5 . $dayLetters->letter_6 . $dayLetters->letter_7;
        $pattern = "^[$letters]+$dayLetters->letter_1[$letters]*$";
        $words = Word::where('word', 'REGEXP', $pattern)->get();
        
        return response()->json(["message"=>$words], Response::HTTP_OK);
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
