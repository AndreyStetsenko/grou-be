<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainSite extends Controller
{
    public function viewSite() {
        return view('site.home');
    }
}
