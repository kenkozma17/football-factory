<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerRating extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'rater_id',
      'acceleration',
      'sprint_speed',
      'vision',
      'crossing',
      'short_pass',
      'finishing',
      'shot_power',
      'stamina',
      'strength',
      'aggression',
      'sliding_tackle',
      'interceptions',
      'agility',
      'ball_control',
      'dribbling'
    ];
}
