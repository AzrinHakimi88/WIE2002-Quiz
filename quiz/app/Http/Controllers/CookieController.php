<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function setCookies()
    {
        // Get the current value of the cookie, if it doesn't exist, default to 0
        $currentValue = $this->getCookies();
        $newValue = is_null($currentValue) ? 1 : $currentValue + 1;

        // Create a response and attach the cookie
        $response = response(view('question2')); // Assuming 'question2' is your intended view
        $response->withCookie(cookie('login-visited', $newValue, 30)); // Cookie lasts for 30 minutes

        return $response;
    }

    public function getCookies()
    {
        return request()->cookie('login-visited');
    }
}
