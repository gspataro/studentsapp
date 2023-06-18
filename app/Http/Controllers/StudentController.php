<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class StudentController extends Controller
{
    public function list(): View
    {
        return view('student.list');
    }

    public function new(): View
    {
        return view('student.new');
    }
}
