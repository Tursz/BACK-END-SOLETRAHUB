<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class PasswordController extends Controller
{


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $user = $request->user();

        if (!Hash::check($request->password, $user->password)) {

            return response()->json([
                'message' => 'Credenciais inválidas'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $request->validate([
            'new_password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user->update([
            'password' => $request->new_password
        ]);

        return response()->json([
            'message' => 'Senha atualizada com sucesso.'
        ], Response::HTTP_OK);
    }

    // método de esqueci a senha (deslogado)
    // método de nova senha (deslogado, com o código enviado no email de esqueci a senha)
    public function newPassword()
    {
    }
}
