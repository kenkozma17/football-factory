<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class PlayerSearchController extends Controller
{
    public function index(Request $request) {
      $search = $request->get('search');
      $players = User::where([
        [function ($query) use ($request) {
          if (($s = $request->search)) {
            $query->orWhere('name', 'LIKE', '%' . $s . '%')
              ->get();
          }
        }]
      ])->whereHas('player_bio', function($query) use ($request) {
        // if (($province = $request->province)) {
        //   $query->where('province', 'LIKE', '%' . $province . '%');
        // }
        // if(($position = $request->position)) {
        //   $query->where('position', 'LIKE', '%' . $position . '%');
        // }
        $query->where('is_public', true);
      })->paginate(18);

      return Inertia::render('Welcome', [
        'players' => $players,
        'search' => $search
      ]);
    }
}
