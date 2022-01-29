<?php

namespace App\Http\Livewire\Admin\Applications;

use App\Repositories\ApplicationRepository;
use App\Traits\WithSearch;
use App\Traits\WithSort;
use Livewire\Component;
use Livewire\WithPagination;

class Applications extends Component
{
    use WithPagination, WithSort, WithSearch;

    protected $listeners = ["deleteApplicationConfirm"];

    public function mount()
    {
        $this->initializeSortables();
    }

    public function render()
    {
        return view('livewire.admin.applications.applications', [
            'list' => $this->getQuery()->paginate(config('setting.rows_per_page', 10)),
        ]);
    }

    public function initializeSortables()
    {
        $this->sortBy = 'created_at';
        $this->sortDirection = 'desc';
        $this->sortableFields = [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'created_at' => 'Created At',
        ];
    }

    protected function getQuery()
    {
        return ApplicationRepository::searchQuery($this->searchQuery)
            ->orderBy($this->sortBy, $this->sortDirection);
    }

    public function delete($application)
    {
        $this->emit("swal:confirm", [
            'type' => 'warning',
            'icon' => 'warning',
            'title' => 'Are you sure?',
            'text' => 'You won\'t be able to revert this!',
            'confirmText' => '<i class="fa fa-check"></i> ' . 'Yes, delete it!',
            'method' => 'deleteApplicationConfirm',
            'params' => $application['id']
        ]);
    }

    public function deleteApplicationConfirm($id)
    {
        $application = (new ApplicationRepository())->delete($id);
        if ($application) {
            $this->emit('swal:modal', [
                'type' => 'success',
                'toast' => false,
                'icon' => 'success',
                'title' => '',
                'timer' => "3000",
                'text' => 'Application deleted successfully.',
            ]);
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
