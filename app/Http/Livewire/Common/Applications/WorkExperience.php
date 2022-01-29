<?php

namespace App\Http\Livewire\Common\Applications;

use Livewire\Component;

class WorkExperience extends Component
{
    public $experiences = [];

    public function mount($experiences = [])
    {
        if (!empty($experiences)) {
            $this->experiences = $experiences;
        } else {
            $this->add();
        }
    }

    public function render()
    {
        return view('livewire.common.applications.work-experience');
    }

    public function add()
    {
        $this->experiences[] = [
            'company' => '',
            'designation' => '',
            'from' => '',
            'to' => '',
        ];
    }

    public function remove($index)
    {
        unset($this->experiences[$index]);
    }

    public function save()
    {
        $this->validate([
            'experiences.*.company' => 'required|string|max:255',
            'experiences.*.designation' => 'required|string|max:255',
            'experiences.*.from' => 'required|date',
            'experiences.*.to' => 'nullable|date',
        ], [
            'experiences.*.company.required' => 'Company is required',
            'experiences.*.designation.required' => 'Designation is required',
            'experiences.*.from.required' => 'From date is required',
        ]);

        $experiences = [];
        foreach ($this->experiences as $experience) {
            $experiences[] = [
                'company' => $experience['company'],
                'designation' => $experience['designation'],
                'from' => $experience['from'],
                'to' => !empty($experience['to']) ? $experience['to'] : null,
            ];
        }

        $this->emitUp('workExperience',$experiences);
    }

    public function back()
    {
        $this->emitUp('back');
    }
}
