<?php

namespace App\Http\Livewire\Grade;

use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;

class Edit extends Component
{
    public Student $student;
    public Grade $grade;
    public bool $editMode = false;

    public string $inputSubject;
    public string $inputGrade;
    public string $inputDate;

    protected $rules = [
        'grade.subject' => 'required|string|min:3|max:255',
        'grade.grade' => 'required|string|max:20',
        'grade.date' => 'required|date'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $this->grade->student_id = $this->student->id;
        $this->grade->save();

        $this->editMode = false;
        $this->emitUp('disableEditMode');
    }

    public function cancel()
    {
        $this->editMode = false;
        $this->emitUp('disableEditMode');
        $this->emitUp('refresh');
    }

    public function edit()
    {
        $this->editMode = true;
        $this->emitUp('enableEditMode');
    }

    public function delete()
    {
        $this->grade->delete();
        $this->emitUp('refresh');
    }

    public function render()
    {
        return view('livewire.grade.edit');
    }
}
