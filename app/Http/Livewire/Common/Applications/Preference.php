<?php

namespace App\Http\Livewire\Common\Applications;

use Livewire\Component;

class Preference extends Component
{
    public $preferred_location, $current_ctc, $expected_ctc, $notice_period;

    public function mount($preference = [])
    {
        $this->preferred_location = $preference['preferred_location'] ?? '';
        $this->current_ctc = $preference['current_ctc'] ?? '';
        $this->expected_ctc = $preference['expected_ctc'] ?? '';
        $this->notice_period = $preference['notice_period'] ?? '';
    }

    public function render()
    {
        return view('livewire.common.applications.preference');
    }

    public function save()
    {
        $this->validate([
            'preferred_location' => 'required',
            'current_ctc' => 'required',
            'expected_ctc' => 'required',
            'notice_period' => 'required',
        ]);

        $data = [
            'preferred_location' => $this->preferred_location,
            'current_ctc' => $this->current_ctc,
            'expected_ctc' => $this->expected_ctc,
            'notice_period' => $this->notice_period,
        ];

        $this->emitUp('preference', $data);
    }

    public function back()
    {
        $this->emitUp('back');
    }
}
