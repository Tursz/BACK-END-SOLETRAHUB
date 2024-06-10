<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RankingController extends Controller
{
    /**
     * Mostra o ranking dos usuário baseado em suas pontuações.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $ranking = DB::table('rankings')
            ->join('users', 'users.id', '=', 'rankings.user_id')
            ->select(
                'users.name',
                'users.avatar',
                DB::raw('SUM(rankings.points) as points'),
                DB::raw('COUNT(user_id) as games'),
            )
            ->groupBy('user_id')
            ->orderByDesc('points')
            ->get();
        return response()->json($ranking, Response::HTTP_OK);
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
