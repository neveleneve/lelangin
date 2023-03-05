<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait UserUtilities
{
  public function updateLastActive()
  {
    if (Auth::check()) {
      User::find(Auth::user()->id)->update([
        'last_active' => date('Y-m-d H:i:s')
      ]);
    }
  }

  public function checkLastActive()
  {
    if (Auth::check()) {
      $userdata = User::find(Auth::user()->id);
      return $userdata['last_active'];
    } else {
      return null;
    }
  }

  public function kMeansGenerateData($userid)
  {
    # code...
  }
}
