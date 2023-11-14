<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlayerBio;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserProfileInformationController extends Controller
{
    public function updateLocation(Request $request) {
      $input = $request->all();
      Validator::make($input, [
          'province' => ['required', 'string', 'max:255'],
          'city' => ['required', 'string', 'max:255']
      ])->validateWithBag('updateProfileLocation');

      $user = PlayerBio::where("user_id", $input['user_id'])->first();
      if($user === null) {
        $user = PlayerBio::create([
          'user_id' => $input['user_id']
        ]);
      }

      $user->fill([
          'province' => $input['province'],
          'city' => $input['city'],
      ])->save();
    }

    public function updateAthleticDetails(Request $request) {
      $input = $request->all();
      Validator::make($input, [
          'preferred_foot' => ['required', 'string', 'max:255'],
          'position' => ['required', 'string', 'max:255'],
          'current_club' => ['nullable','string', 'max:255'],
          'height' => ['required', 'numeric', 'max:255'],
          'weight' => ['required', 'numeric', 'max:255'],
          'nationality' => ['required', 'string', 'max:255'],
          'current_school' => ['nullable','string', 'max:255'],
          'graduation_year' => ['nullable','string', 'max:255'],
      ])->validateWithBag('updateAthleticDetails');

      $user = PlayerBio::where("user_id", $input['user_id'])->first();
      if($user === null) {
        $user = PlayerBio::create([
          'user_id' => $input['user_id']
        ]);
      }
      $user->fill($input)->save();
    }

    public function updateSocials(Request $request) {
      $input = $request->all();
      Validator::make($input, [
          'highlights_url' => ['nullable', 'string', 'max:255'],
          'instagram_url' => ['nullable', 'string', 'max:255'],
          'facebook_url' => ['nullable', 'string', 'max:255'],
          'youtube_url' => ['nullable', 'string', 'max:255'],
          'phone' => ['nullable', 'string', 'max:255'],
      ])->validateWithBag('updateProfileSocials');

      $user = PlayerBio::where("user_id", $input['user_id'])->first();
      if($user === null) {
        $user = PlayerBio::create([
          'user_id' => $input['user_id']
        ]);
      }
      $user->forceFill([
        'highlights_url' => $input['highlights_url'],
        'instagram_url' => $input['instagram_url'],
        'facebook_url' => $input['facebook_url'],
        'youtube_url' => $input['youtube_url'],
        'phone' => $input['phone'],
      ])->save();
    }
}
