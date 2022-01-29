<?php

namespace App\Http\Livewire\Common\Applications;

use Livewire\Component;

class TechnicalExperience extends Component
{
    public $experiences = [], $allowed_experiences = [];

    public function mount($experiences = [])
    {
        $this->experiences = $experiences;
        if (empty($experiences)) {
            $this->add();
        }
        $this->allowed_experiences = config('setting.technical_experiences');
    }

    public function render()
    {
        return view('livewire.common.applications.technical-experience');
    }

    public function add()
    {
        $this->experiences[] = [
            [
                'name' => '',
                'experience' => '',
            ]
        ];
    }

    public function remove($index)
    {
        unset($this->experiences[$index]);
    }

    public function save()
    {
        $this->validate([
            'experiences.*.name' => 'required|string|max:255',
            'experiences.*.experience' => 'required',
        ], [
            'experiences.*.name.required' => 'Please enter the name of technology.',
            'experiences.*.experience.required' => 'Please enter the experience',
        ]);

        $this->emitUp('technicalExperience', $this->experiences);
    }

    public function back()
    {
        $this->emitUp('back');
    }
}
