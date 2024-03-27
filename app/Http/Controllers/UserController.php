<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\WelcomeMail;
use App\Mail\ResetPasswordMail;

class UserController extends Controller
{
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
{

    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'is_super_admin' => 'boolean',
    ]);

    $user = User::create([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        'is_super_admin' => $request->input('is_super_admin', false),
    ]);

    // Send welcome email
     Mail::to($user->email)->send(new WelcomeMail($user));

    return response()->json(['message' => 'User registered successfully'], 201);
}

    /**
     * Login functionality.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user-> createToken('AuthToken')->accessToken;
            return response()->json(['user' => $user, 'access_token' => $token], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    /**
     * Forgot password functionality.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Generate password reset token and send email
        $user = User::where('email', $request->input('email'))->first();
        $token = Str::random(60);
        $user->password_reset_token()->create(['token' => $token]);

        Mail::to($user->email)->send(new ResetPasswordMail($user));

        return response()->json(['message' => 'Password reset email sent successfully'], 200);
    }

    /**
     * Get all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    // Other methods for update password, delete user, etc. can be implemented here
}
