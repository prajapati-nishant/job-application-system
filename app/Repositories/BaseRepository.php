<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Log;

class BaseRepository
{
    protected $model;


    public function getAll($relations = [])
    {
        try {
            return $this->model->with($relations)->get();
        } catch (\Exception $exception) {
            log_error($exception);
            return false;
        }
    }

    public function getById($id, $relations = [])
    {
        try {
            return $this->model->with($relations)->find($id);
        } catch (\Exception $exception) {
            log_error($exception);
            return false;
        }
    }

    public function store($data)
    {
        try {
            return $this->model->create($data);
        } catch (\Exception $exception) {
            log_error($exception);
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $model = $this->model->find($id);
            $model->update($data);
            return $model;
        } catch (\Exception $exception) {
            log_error($exception);
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $model = $this->model->find($id);
            $model->delete();
            return true;
        } catch (\Exception $exception) {
            log_error($exception);
            return false;
        }
    }

}
