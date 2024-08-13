<?php


namespace App\Http\Service;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Auth
{
    public function getUser(Request $request): User
    {
        $user = User::query()->where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => __('auth.invalid_auth')
            ]);
        }

        return $user;
    }
}
