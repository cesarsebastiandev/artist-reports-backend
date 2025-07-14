<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function getArtists()
    {
        $artists = Artist::all();
        if ($artists->isEmpty()) {
            return response()->json(['message' => 'No artists'], 404);
        }
        return response()->json($artists, 200);
    }
}
