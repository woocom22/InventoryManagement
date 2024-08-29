<?php

namespace App\helper;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Mockery\Exception;

class JWTToken
{
   public static function createToken($userEmail, $userId):string {
        $key = env('JWT_KEY');
        $payload = [
            "iss" => env('JWT-HR'),   // issuer name
            "iat" => time(),               // issue time
            'exp' => time() + 60*60,       // expire date
            'userEmail' => $userEmail,     // user email
            'userId'=> $userId    // user id
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
    public static function createTokenForPasswordReset($userEmail):string {
        $key = env('JWT_KEY');
        $payload = [
            "iss" => env('JWT-HR'),   // issuer name
            "iat" => time(),               // issue time
            'exp' => time() + 60*20,       // expire date
            'userEmail' => $userEmail,     // user email
            'userId'=> '0'
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
    public static function verifyToken($token):string|object
    {
        try {
            if ($token==null){
                return 'unauthorized';
            }
            else{
                $Key = env('JWT_KEY');
                $decode=JWT::decode($token, new Key($Key, 'HS256'));
                return $decode;
            }

        }
        catch (Exception $e){
            return 'Unauthorized';
        };
    }



}
