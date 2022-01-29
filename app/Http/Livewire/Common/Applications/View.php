<?php

namespace App\Http\Livewire\Common\Applications;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $application, $is_admin, $from_form;

    public function mount($application, $from_form = true)
    {
        $this->application = $application;
        $this->is_admin = Auth::check();
        $this->from_form = $from_form;
    }

    public function render()
    {
        return view('livewire.common.applications.view');
    }

    public function back()
    {
        $this->emitUp('back');
    }

    public function submit()
    {
        $this->emitUp('confirmApplication');
    }
}
