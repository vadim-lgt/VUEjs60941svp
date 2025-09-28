<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        //\Log::info('Login attempt', $request->all()); // Логируем данные запроса
        //\Log::info('User class', ['class' => User::class]); // Логируем имя класса пользователя

        $fields=$request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        //\Log::info('User class check', ['class_methods' => get_class_methods(User::class)]); // Логируем методы класса

        //\Log::info('User Builder', [get_class(\App\Models\User::query())]); // Логируем класс билдера
        $user = User::where('email', $fields['email'])->first();
        //\Log::info('User found', ['user' => $user]); // Логируем найденного пользователя

        if(!$user)
        {
            return response(['message' => 'Wrong email'], 401);
        }

        if (!Hash::check($fields['password'], $user->password))
        {
            return response(['message' => 'Wrong password'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        // Удаляем текущий токен пользователя
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Logged out'
        ]);
    }
}
