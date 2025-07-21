<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//PUBLIC ROUTES
Route::get('artists', [ArtistController::class, 'getArtists']);
Route::get('artists/pdf', [ReportController::class, 'generatePDF']);
