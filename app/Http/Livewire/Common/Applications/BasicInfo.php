<?php

namespace App\Http\Livewire\Common\Applications;

use Livewire\Component;

class BasicInfo extends Component
{
    public $first_name, $last_name, $email, $phone, $gender, $line_1, $line_2, $city, $state, $zip;

    public function mount($basic_info = [])
    {
        if (!empty($basic_info['first_name'])) {
            $this->first_name = $basic_info['first_name'];
        }
        if (!empty($basic_info['last_name'])) {
            $this->last_name = $basic_info['last_name'];
        }
        if (!empty($basic_info['email'])) {
            $this->email = $basic_info['email'];
        }
        if (!empty($basic_info['phone'])) {
            $this->phone = $basic_info['phone'];
        }
        if (!empty($basic_info['gender'])) {
            $this->gender = $basic_info['gender'];
        }
        if (!empty($basic_info['line_1'])) {
            $this->line_1 = $basic_info['line_1'];
        }
        if (!empty($basic_info['line_2'])) {
            $this->line_2 = $basic_info['line_2'];
        }
        if (!empty($basic_info['city'])) {
            $this->city = $basic_info['city'];
        }
        if (!empty($basic_info['state'])) {
            $this->state = $basic_info['state'];
        }
        if (!empty($basic_info['zip'])) {
            $this->zip = $basic_info['zip'];
        }
    }

    public function render()
    {
        return view('livewire.common.applications.basic-info');
    }

    public function save()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:10',
            'gender' => 'required',
            'line_1' => 'required|string|max:255',
            'line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|digits:8',
        ]);
        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'line_1' => $this->line_1,
            'line_2' => $this->line_2,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip
        ];
        $this->emitUp('basicInfo', $data);
    }
}
