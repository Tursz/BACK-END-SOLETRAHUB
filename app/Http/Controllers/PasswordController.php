<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class PasswordController extends Controller
{


    /**
     * Editar senha usuário logado
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
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' =>['required','email','exists:users,email'],
        ]);

        $user = User::where('email', $request->email)->first();

        Mail::to($user)->send(new ForgotPassword($user));

        return response()->json(['message' => 'Verifique seu email.'], Response::HTTP_OK);
    }
    // método de nova senha (deslogado, com o código enviado no email de esqueci a senha)
    public function newPassword(Request $request)
    {
        $request->validate([
            'token'    => ['required','min:6','max:6'],
            'password' => ['required','min:6','max:30','confirmed'],
        ]);

        $data = DB::select("select * from password_reset_tokens where token =?", [$request->token]);
         if(!$data){
            return response()->json(['message' => 'Token inválido.'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $user=User::where('email',$data[0]->email)->first();
        $user->update([
            'password' => $request->password
        ]);

        DB::delete('delete from password_reset_tokens where email =?', [$user->email]);

        return response()->json(['message' => 'Senha atualizada com sucesso.'], Response::HTTP_OK);
    }
}
