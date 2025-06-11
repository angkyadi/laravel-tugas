<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

Route::resource('jadwals', JadwalController::class);
