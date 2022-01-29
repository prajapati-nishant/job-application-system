<?php

namespace App\Traits;

trait WithSort
{
    public $sortable = true;
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $sortableFields = [
        'created_at' => 'Created At',
    ];

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';

        $this->sortBy = $field;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }

}
