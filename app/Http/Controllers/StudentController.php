<?php

namespace App\Http\Controllers;

use App\Models\Institute;
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

    public function edit(?Student $student): View
    {
        $instituteItems = [];
        $institutes = Institute::all();

        if (!empty($institutes)) {
            foreach ($institutes as $institute) {
                $instituteItems[] = [
                    'label' => $institute->name . ' (' . $institute->city . ')',
                    'value' => $institute->id
                ];
            }
        }

        return view('student.edit', [
            'student' => $student,
            'institutes' => $instituteItems
        ]);
    }

    public function store(Request $request, ?Student $student): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'city' => 'required|max:255',
            'birthday' => 'required|date',
            'institute' => 'required|exists:institutes,id'
        ]);

        $newStudent = is_null($student);
        $student = $student ?? new Student();

        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->city = $request->input('city');
        $student->birthday = $request->input('birthday');
        $student->institute_id = $request->input('institute');

        $student->save();

        if ($newStudent) {
            return to_route('student.new')->with('success', 'Student created successfully!');
        }

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
