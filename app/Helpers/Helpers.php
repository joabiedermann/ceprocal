<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Attachment;
use App\Models\LandingPage;

class Helpers
{
    public static function isUserLogin()
    {
        return auth()?->check();
    }

    public static function getCurrentUserId()
    {
      if (self::isUserLogin()) {
        return auth()?->user()?->id;
      }
    }
}