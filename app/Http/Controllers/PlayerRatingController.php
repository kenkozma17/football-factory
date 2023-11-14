<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class PlayerRatingController extends Controller
{
    public function show($id) {
      $player = User::find($id);
      return Inertia::render('Players/Rating/Show', [
        'player' => $player
      ]);
    }
}
