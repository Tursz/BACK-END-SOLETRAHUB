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
     * Cadastro de um novo usuário.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nickname' => $request->nickname,
            'avatar' => $request->avatar,
            'password' => $request->password
        ]);

        return response()->json([
            'message' => 'Cadastrado com sucesso',
            'user' => $user
        ], Response::HTTP_OK);
    }

    /**
     * Mostra um usuário especifíco de acordo com o $id junto com sua pontuação e
     * quantidade de jogos.
     * @return \Illuminate\Http\JsonResponse
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
     * Atualiza o usuário.
     * @return \Illuminate\Http\JsonResponse
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
     * Apaga o registro do usuário.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->rankings()->delete();
        $user->delete();
        return response()->json([
           'message' => 'Usuário deletado com sucesso.'
        ], Response::HTTP_OK);
    }
}
