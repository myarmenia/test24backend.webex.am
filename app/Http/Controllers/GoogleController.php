<?php

namespace App\Http\Controllers;

use App\Models\User;
use Google_Client;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        // return Socialite::driver('google')->redirect();


        return response()->json([
            'url' => Socialite::driver('google')->stateless()->redirect()->getTargetUrl()
        ]);

    }

        public function handleGoogleCallback(Request $request)
    {

        $token = $request->token;

        $client = new Google_Client();

        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        // dd($client);
        $payload = $client->verifyIdToken($token);
        // dd($payload);
        $email = $payload['email'];
        // dd($email);
        $google_user = User::where('email', $email)->first();

        if($google_user==null){

            $google_user = User::where('email', $email)->firstOrCreate([
                'name' => $payload['given_name'],
                'surname' => $payload['family_name'],
                'email' => $email,
                'google_id' => $payload['sub'],

            ]);



        }
        $token = JWTAuth::fromUser($google_user);

        return response()->json(['success' => true, 'access_token' => $token, 'authUser' => $google_user]);


    }



}
