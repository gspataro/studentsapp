<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class InstituteController extends Controller
{
    public function list(): View
    {
        return view('institute.list');
    }
}
