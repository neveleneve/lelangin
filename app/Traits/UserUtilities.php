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

  public function getUsername($id)
  {
    $username = User::find($id);
    return $username['username'];
  }

  public function getNames($id)
  {
    $username = User::find($id);
    return $username['name'];
  }

  public function cencorName($username)
  {
    $count = strlen($username) - (strlen($username) - (strlen($username) - 2));
    $output = substr_replace($username, str_repeat('*', $count), 2, $count);
    return $output;
  }

  public function kMeansGenerateData($userid)
  {
    # code...
  }
}
