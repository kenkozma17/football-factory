<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class PlayerBio extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'province',
      'city',
      'preferred_foot',
      'position',
      'current_club',
      'height',
      'weight',
      'nationality',
      'current_school',
      'graduation_year',
      'highlights_url',
      'instagram_url',
      'facebook_url',
      'youtube_url',
      'phone'
    ];

    protected $appends = ['location', 'birthday', 'age', 'short_position'];

    public function getLocationAttribute() {
      return $this->city . ', ' . $this->province;
    }

    public function getBirthdayAttribute() {
      $birthdate = Carbon::parse($this->birthdate);
      return $birthdate->format('M d, Y');
    }

    public function getAgeAttribute() {
      $birthdate = Carbon::parse($this->birthdate);
      return $birthdate->age;
    }

    public function getShortPositionAttribute() {
      $positions = [
        'Goalkeeper' => 'GK',
        'Right Full Back' => 'RB',
        'Left Full Back' => 'LB',
        'Right Center Back' => 'CB',
        'Left Center Back' => 'CB',
        'Attacking Midfielder' => 'CAM',
        'Defensive Midfielder' => 'CDM',
        'Right Winger' => 'RW',
        'Left Winger' => 'LW',
        'Striker/Forward' => 'ST',
      ];

      return $positions[$this->position];
    }
}
