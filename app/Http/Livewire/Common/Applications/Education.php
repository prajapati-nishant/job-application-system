<?php

namespace App\Http\Livewire\Common\Applications;

use Livewire\Component;

class Education extends Component
{
    public $educations = [];

    public function mount($educations = [])
    {
        if (!empty($educations)) {
            $this->educations = $educations;
        }else{
            $this->add();
        }
    }

    public function render()
    {
        return view('livewire.common.applications.education');
    }

    public function add()
    {
        $this->educations[] = [
            'degree' => '',
            'university' => '',
            'year' => '',
            'grade' => '',
        ];
    }

    public function remove($index)
    {
        unset($this->educations[$index]);
    }

    public function save()
    {
        $this->validate([
            'educations.*.degree' => 'required|string|max:255',
            'educations.*.university' => 'required|string|max:255',
            'educations.*.year' => 'required|string|max:255',
            'educations.*.grade' => 'required|string|max:255',
        ],[
            'educations.*.degree.required' => 'Degree/Certificate is required',
            'educations.*.university.required' => 'University/Board is required',
            'educations.*.year.required' => 'Year is required',
            'educations.*.grade.required' => 'Grade/Percentage is required',
        ]);

        $this->emitUp('educations', $this->educations);
    }

    public function back()
    {
        $this->emitUp('back');
    }
}
