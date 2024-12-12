<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguagesController extends Controller
{
    public function set_language($language)
    {
        App::setLocale($language);
        Session::put("language", $language);
        return redirect()->route("dashboard");
    }
}
