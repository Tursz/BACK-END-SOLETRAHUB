<?php

namespace App\Http\Controllers;

use App\Http\Requests\DayLetterRequest;
use App\Models\DayLetter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DayLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!$request->date){
            $letters = DayLetter::orderByDesc('date')->get();
        }
        $letters = DayLetter::where('date', $request->date)->first();
        return response()->json($letters, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DayLetterRequest $request)
    {
        // $letters = DayLetter::create([
        //     'letter_1' => $request->letter_1,
        //     'letter_2' => $request->letter_2,
        //     'letter_3' => $request->letter_3,
        //     'letter_4' => $request->letter_4,
        //     'letter_5' => $request->letter_5,
        //     'letter_6' => $request->letter_6,
        //     'letter_7' => $request->letter_7,
        //     'date' => date('Y-m-d'),
        // ]);
        // return response()->json($letters, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $date)
    {
        // dd($id);
        // $letters = DayLetter::whereDate('created_at','=', $date)->first();
        // return response()->json($letters, Response::HTTP_OK);
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
        // $dayLetter = DayLetter::find($id);
        // $dayLetter->delete();
    }
}
