<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch(Request $request, $locale)
    {
        App::setLocale($locale);
        session(['locale' => $locale]);

        // Redirect to the homepage or a specific route
        return redirect()->route('home');
    }
}
