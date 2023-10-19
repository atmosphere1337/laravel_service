<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController;

Route::get('/', function () { return view('form_page'); });
Route::post('/process', [myController::class, 'main']);
