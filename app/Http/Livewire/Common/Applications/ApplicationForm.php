<?php

namespace App\Http\Livewire\Common\Applications;

use App\Repositories\ApplicationRepository;
use Livewire\Component;

class ApplicationForm extends Component
{
    public $step = 1, $application = [], $application_id;
    public $basic_info = [], $educations = [], $work_experience = [], $languages = [], $technical_experience = [], $preference = [];

    protected $listeners = ['confirmApplication', 'back', 'basicInfo', 'educations', 'workExperience', 'languages', 'technicalExperience', 'preference',];

    public function mount($id = null)
    {
        $this->application_id = $id;
        if (!empty($this->application_id)) {
            $application = (new ApplicationRepository())->getById($id, [
                'address', 'educations', 'experiences', 'languages', 'technicalExperiences'
            ])->toArray();
            $this->application = $application;
            $this->generateData();
        }
    }

    public function render()
    {
        return view('livewire.common.applications.application-form');
    }

    public function generateData()
    {
        $this->basic_info = [
            'first_name' => $this->application['first_name'],
            'last_name' => $this->application['last_name'],
            'email' => $this->application['email'],
            'phone' => $this->application['phone'],
            'gender' => $this->application['gender'],
            'line_1' => $this->application['address']['line_1'],
            'line_2' => $this->application['address']['line_2'],
            'city' => $this->application['address']['city'],
            'state' => $this->application['address']['state'],
            'zip' => $this->application['address']['zip'],
        ];
        $this->preference = [
            'preferred_location' => $this->application['preferred_location'],
            'current_ctc' => $this->application['current_ctc'],
            'expected_ctc' => $this->application['expected_ctc'],
            'notice_period' => $this->application['notice_period'],
        ];
        $this->educations = $this->application['educations'];
        $this->work_experience = $this->application['experiences'];
        $this->languages = $this->application['languages'];
        $this->technical_experience = $this->application['technical_experiences'];
    }

    public function back()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function basicInfo($basic_info)
    {
        $this->basic_info = $basic_info;
        $this->step = 2;
    }

    public function educations($educations)
    {
        $this->educations = $educations;
        $this->step = 3;
    }

    public function workExperience($work_experience)
    {
        $this->work_experience = $work_experience;
        $this->step = 4;
    }

    public function languages($languages)
    {
        $this->languages = $languages;
        $this->step = 5;
    }

    public function technicalExperience($technical_experience)
    {
        $this->technical_experience = $technical_experience;
        $this->step = 6;
    }

    public function preference($preference)
    {
        $this->preference = $preference;
        $this->generateApplication();
        $this->step = 7;
    }


    public function generateApplication()
    {
        $this->application = [
            'id' => $this->application_id,
            'first_name' => $this->basic_info['first_name'],
            'last_name' => $this->basic_info['last_name'],
            'email' => $this->basic_info['email'],
            'phone' => $this->basic_info['phone'],
            'gender' => $this->basic_info['gender'],
            'preferred_location' => $this->preference['preferred_location'],
            'current_ctc' => $this->preference['current_ctc'],
            'expected_ctc' => $this->preference['expected_ctc'],
            'notice_period' => $this->preference['notice_period'],
        ];
        $this->application['address'] = [
            'line_1' => $this->basic_info['line_1'],
            'line_2' => $this->basic_info['line_2'],
            'city' => $this->basic_info['city'],
            'state' => $this->basic_info['state'],
            'zip' => $this->basic_info['zip']
        ];
        $this->application['educations'] = $this->educations;
        $this->application['experiences'] = $this->work_experience;
        $this->application['languages'] = $this->languages;
        $this->application['technicalExperiences'] = $this->technical_experience;
    }

    public function confirmApplication()
    {
        if (!empty($this->application_id)) {
            $application = (new ApplicationRepository())->update($this->application_id, $this->application);
        } else {
            $application = (new ApplicationRepository())->store($this->application);
        }
        if ($application) {
            if (!empty($this->application_id)) {
                $this->redirect(route('admin.applications.view',['application'=>$this->application_id]));
            } else {
                $this->step = 8;
            }

        } else {
            $this->emit('swal:modal', [
                'type' => 'error',
                'toast' => false,
                'icon' => 'error',
                'title' => '',
                'timer' => "3000",
                'text' => 'Something went wrong.',
            ]);
        }
    }

}
