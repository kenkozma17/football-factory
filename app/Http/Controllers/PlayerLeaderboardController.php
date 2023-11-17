<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\PlayerStat;

class PlayerLeaderboardController extends Controller
{
    public function index() {
      $topPlayerStats = PlayerStat::with(['user'])->whereHas('player_bio', function($query) {
        $query->where('is_public', true);
      })->orderBy('overall_rating', 'desc')->get();

      return Inertia::render('Leaderboards/Show', [
        'topPlayerStats' => $topPlayerStats
      ]);
    }
}
