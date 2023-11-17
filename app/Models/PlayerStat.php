<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
use App\Models\PlayerBio;

class PlayerStat extends Model
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
      'dribbling',
      'overall_rating'
    ];

    protected $appends = ['pace', 'passing', 'shooting', 'physicality', 'defending', 'dribbling_stat'];

    public function getPaceAttribute() {
      return number_format(collect([$this->acceleration, $this->sprint_speed])->avg());
    }

    public function getPassingAttribute() {
      return number_format(collect([$this->vision, $this->crossing, $this->short_pass])->avg());
    }

    public function getShootingAttribute() {
      return number_format(collect([$this->finishing, $this->shot_power])->avg());
    }

    public function getPhysicalityAttribute() {
      return number_format(collect([$this->stamina, $this->strength, $this->aggression])->avg());
    }

    public function getDefendingAttribute() {
      return number_format(collect([$this->sliding_tackle, $this->interceptions])->avg());
    }

    public function getDribblingStatAttribute() {
      return number_format(collect([$this->agility, $this->ball_control, $this->dribbling])->avg());
    }

    public function user(): hasOne {
      return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function player_bio(): HasOne
    {
        return $this->hasOne(PlayerBio::class, 'user_id', 'user_id');
    }
}
