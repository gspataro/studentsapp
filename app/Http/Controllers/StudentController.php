<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class StudentController extends Controller
{
    public function list(): View
    {
        return view('student.list');
    }
}
