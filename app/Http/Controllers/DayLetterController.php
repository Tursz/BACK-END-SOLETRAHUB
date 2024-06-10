<?php

namespace App\Http\Controllers;

use App\Http\Requests\DayLetterRequest;
use App\Models\DayLetter;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DayLetterController extends Controller
{
    /**
     * Mostra todas as letras de dias anteriores ou do dia solicitado.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if(!$request->date){
            $letters = DayLetter::orderByDesc('date')->get();
            return response()->json($letters, Response::HTTP_OK);
        }
        if(!$letters=DayLetter::where('date',$request->date)->first()){
            return response()->json([
                'message' => 'Data não encontrada.'
            ], Response::HTTP_NOT_FOUND);
        }
        $letters = DayLetter::where('date', $request->date)->first();
        return response()->json($letters, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DayLetterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $date)
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
