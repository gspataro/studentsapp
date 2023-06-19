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
        return view('student.new');
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

    public function update(Student $student): View
    {
        return view('student.update', [
            'student' => $student
        ]);
    }

    public function change(Request $request, Student $student): RedirectResponse
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

        return to_route('student.update', [
            'student' => $student
        ])->with('success', 'Student updated successfully!');
    }
}
