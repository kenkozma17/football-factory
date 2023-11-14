<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class PlayerSearchController extends Controller
{
    public function index() {
      $players = User::whereHas('player_bio', function($query) {
        $query->where('is_public', true);
      })->get();

      return Inertia::render('Welcome', [
        'players' => $players,
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
      ]);
    }
}
