<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nickname' => $request->nickname,
            'password' => $request->password
        ]);

        return response()->json([
            'message' => 'Cadastrado com sucesso',
            'user' => $user
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(!$user = User::find($id)){
            return response()->json(['message'=> 'Usuário não encontrado.'], Response::HTTP_NOT_FOUND);
        }
        $points = DB::table('rankings')
            ->join('users', 'users.id', '=', 'rankings.user_id')
            ->where('users.id', $id)
            ->select(
                DB::raw('SUM(rankings.points) as points'),
                DB::raw('COUNT(user_id) as games'),
            )->get(); 
        return response()->json([$user, $points], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request)
    {
        $user = $request->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nickname' => $request->nickname,
            'avatar' => $request->avatar,
        ]);

        return response()->json([
            'message' => 'Editado com sucesso',
            'user' => $user
        ], Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
