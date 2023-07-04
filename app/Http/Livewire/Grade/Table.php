<?php

namespace App\Http\Livewire\Grade;

use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;

class Table extends Component
{
    public Student $student;
    public array $grades;
    public bool $editMode = false;

    protected $listeners = [
        'refresh' => 'refresh',
        'disableEditMode' => 'disableEditMode',
        'enableEditMode' => 'enableEditMode'
    ];

    public function mount(Student $student)
    {
        $this->student = $student;
        $this->grades = $this->student->grades->all();
    }

    public function refresh()
    {
        $this->student->grades->fresh();
        $this->grades = $this->student->grades->all();
    }

    public function disableEditMode()
    {
        $this->editMode = false;
    }

    public function enableEditMode()
    {
        $this->editMode = true;
    }

    public function addGrade()
    {
        if ($this->editMode) {
            return;
        }

        $this->grades[] = new Grade();
        $this->editMode = true;
    }

    public function render()
    {
        return view('livewire.grade.table');
    }
}
