<?php

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PessoaController::class,'index']);
Route::post('/', [PessoaController::class,'store']);