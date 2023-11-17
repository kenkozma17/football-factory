<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\PlayerRating;
use App\Models\PlayerStat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PlayerRatingController extends Controller
{
    public function show($id) {
      $player = User::whereHas('player_bio', function($query) {
        $query->where('is_public', true);
      })->where('id', $id)->first();

      return Inertia::render('Players/Rating/Show', [
        'player' => $player,
      ]);
    }

    public function store(Request $request, $id) {
      $input = $request->all();

      // Has not rated player before  
      $playerRatingExists = PlayerRating::where('rater_id', Auth::user()->id)->where('user_id', $id)->first();
      if($playerRatingExists !== null) {
        return redirect()->back()->withErrors(['rating_exists_already' => 'A player can only rate another player once.'], 'createPlayerRating');
      }

      Validator::make($input, [
        'acceleration' => ['required', 'numeric'],
        'sprint_speed' => ['required', 'numeric'],
        'vision' => ['required', 'numeric'],
        'crossing' => ['required', 'numeric'],
        'short_pass' => ['required', 'numeric'],
        'finishing' => ['required', 'numeric'],
        'shot_power' => ['required', 'numeric'],
        'stamina' => ['required', 'numeric'],
        'strength' => ['required', 'numeric'],
        'aggression' => ['required', 'numeric'],
        'sliding_tackle' => ['required', 'numeric'],
        'interceptions' => ['required', 'numeric'],
        'agility' => ['required', 'numeric'],
        'ball_control' => ['required', 'numeric'],
        'dribbling' => ['required', 'numeric'],
      ])->validateWithBag('createPlayerRating');

      $rating = PlayerRating::create([
        'user_id' => $id,
        'rater_id' => Auth::user()->id,
        'acceleration' => $input['acceleration'] * 10,
        'sprint_speed' => $input['sprint_speed'] * 10,
        'vision' => $input['vision'] * 10,
        'crossing' => $input['crossing'] * 10,
        'short_pass' => $input['short_pass'] * 10,
        'finishing' => $input['finishing'] * 10,
        'shot_power' => $input['shot_power'] * 10,
        'stamina' => $input['stamina'] * 10,
        'strength' => $input['strength'] * 10,
        'aggression' => $input['aggression'] * 10,
        'sliding_tackle' => $input['sliding_tackle'] * 10,
        'interceptions' => $input['interceptions'] * 10,
        'agility' => $input['agility'] * 10,
        'ball_control' => $input['ball_control'] * 10,
        'dribbling' => $input['dribbling'] * 10,
      ]);

      $this->createPlayerStats($id);

    }

    public function calculateAvgRating($numbersArr) {
      $numbers = collect($numbersArr);
      return $numbers->avg();
    }

    public function createPlayerStats($id) {
      $allRatings = PlayerRating::where('user_id', $id);
      $playerStats = PlayerStat::where('user_id', $id)->first();
      if(!$playerStats) {
        $playerStats = PlayerStat::create([
          'user_id' => $id
        ]);
      }

      $playerStats->fill([
        'acceleration' => $this->calculateAvgRating($allRatings->pluck('acceleration')),
        'sprint_speed' => $this->calculateAvgRating($allRatings->pluck('sprint_speed')),
        'vision' => $this->calculateAvgRating($allRatings->pluck('vision')),
        'crossing' => $this->calculateAvgRating($allRatings->pluck('crossing')),
        'short_pass' => $this->calculateAvgRating($allRatings->pluck('short_pass')),
        'finishing' => $this->calculateAvgRating($allRatings->pluck('finishing')),
        'shot_power' => $this->calculateAvgRating($allRatings->pluck('shot_power')),
        'stamina' => $this->calculateAvgRating($allRatings->pluck('stamina')),
        'strength' => $this->calculateAvgRating($allRatings->pluck('strength')),
        'aggression' => $this->calculateAvgRating($allRatings->pluck('aggression')),
        'sliding_tackle' => $this->calculateAvgRating($allRatings->pluck('sliding_tackle')),
        'interceptions' => $this->calculateAvgRating($allRatings->pluck('interceptions')),
        'agility' => $this->calculateAvgRating($allRatings->pluck('agility')),
        'ball_control' => $this->calculateAvgRating($allRatings->pluck('ball_control')),
        'dribbling' => $this->calculateAvgRating($allRatings->pluck('dribbling')),
      ]);
      $playerStats->save();
      
      $playerStats->overall_rating = $this->calculateOverallRating($playerStats);
      $playerStats->save();
    }

    public function calculateOverallRating($playerStats) {
      return number_format(collect([
        $playerStats->pace,
        $playerStats->passing,
        $playerStats->shooting,
        $playerStats->physicality,
        $playerStats->defending,
        $playerStats->dribbling_stat,
      ])->avg());
    }
}
