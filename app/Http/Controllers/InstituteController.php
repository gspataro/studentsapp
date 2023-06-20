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

    public function edit(Institute $institute): View
    {
        return view('institute.edit', [
            'institute' => $institute
        ]);
    }

    public function store(Request $request, ?Institute $institute): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'city' => 'required|max:255'
        ]);

        $newInstitute = is_null($institute);
        $institute = $institute ?? new Institute();

        $institute->name = $request->input('name');
        $institute->city = $request->input('city');

        $institute->save();

        if ($newInstitute) {
            return to_route('institute.new')->with('success', 'Institute added successfully!');
        }

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
