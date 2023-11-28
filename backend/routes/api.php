<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/users', function(){
    
    return User::paginate(10);
});

Route::post('/user', function(Request $request){

    $request->validate([
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
    ],[
        'firstName.required' => 'O Campo nome é obrigatório',
        'lastName.required' => 'O Campo sobrenome é obrigatório',
        'email.required' => 'O campo email é obrigatório',
        'email.unique' => 'O e-mail já esta cadastrado',
        'email.password' => 'O campo senha é obrigatório',
    ]);

});

Route::get('/users/search', function(Request $request){
    $user = $request->input('user');

    return User::where('firstName','like','%'.$user.'%')->paginate(10);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
