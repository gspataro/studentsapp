<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list(): View
    {
        $students = Student::all();

        return view('student.list', [
            'students' => $students
        ]);
    }

    public function new(): View
    {
        return view('student.edit');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'city' => 'required|max:255',
            'birthday' => 'required|date'
        ]);

        $student = new Student();

        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->city = $request->input('city');
        $student->birthday = $request->input('birthday');

        $student->save();

        return to_route('student.new')->with('success', 'Student created successfully!');
    }

    public function edit(Student $student): View
    {
        return view('student.edit', [
            'student' => $student
        ]);
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'city' => 'required|max:255',
            'birthday' => 'required|date'
        ]);

        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->city = $request->input('city');
        $student->birthday = $request->input('birthday');

        $student->save();

        return to_route('student.edit', [
            'student' => $student
        ])->with('success', 'Student updated successfully!');
    }

    public function delete(Student $student): RedirectResponse
    {
        $student->delete();

        return to_route('student.list')->with('message', 'Student ' . $student->name . ' deleted successfully!');
    }
}
