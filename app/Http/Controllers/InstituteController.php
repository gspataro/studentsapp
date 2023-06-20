<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InstituteController extends Controller
{
    public function list(): View
    {
        $institutes = Institute::all();

        return view('institute.list', [
            'institutes' => $institutes
        ]);
    }

    public function single(Institute $institute): View
    {
        $students = $institute->students->all();

        return view('student.list', [
            'students' => $students
        ]);
    }

    public function new(): View
    {
        return view('institute.edit');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255'
        ]);

        $institute = new Institute();

        $institute->name = $request->input('name');
        $institute->city = $request->input('city');

        $institute->save();

        return to_route('institute.new')->with('success', 'Institute added successfully!');
    }

    public function edit(Institute $institute): View
    {
        return view('institute.edit', [
            'institute' => $institute
        ]);
    }

    public function update(Request $request, Institute $institute): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255'
        ]);

        $institute->name = $request->input('name');
        $institute->city = $request->input('city');

        $institute->save();

        return to_route('institute.edit', [
            'institute' => $institute
        ])->with('success', 'Institute added successfully!');
    }

    public function delete(Institute $institute): RedirectResponse
    {
        $institute->delete();

        return to_route('institute.list')->with('message', 'Institute deleted successfully!');
    }
}
