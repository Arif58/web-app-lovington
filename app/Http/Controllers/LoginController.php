<?php
namespace App\Http\Controllers\api;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller{
    public function log(Request $request)
    {
        $response = Http::post('http://192.168.30.125:8080/api/register', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $body = $response->body();
        return $body;
    }
}