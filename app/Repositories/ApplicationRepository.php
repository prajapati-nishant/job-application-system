<?php

namespace App\Repositories;

use App\Models\Application;
use Illuminate\Support\Facades\DB;

class ApplicationRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Application();
    }

    public static function searchQuery($search_string)
    {
        $query = Application::query();
        if (!empty($search_string)) {
            $query->where('first_name', 'like', '%' . $search_string . '%')
                ->orWhere('last_name', 'like', '%' . $search_string . '%')
                ->orWhere('email', 'like', '%' . $search_string . '%')
                ->orWhere('phone', 'like', '%' . $search_string . '%')
                ->orWhere('gender', 'like', '%' . $search_string . '%')
                ->orWhere('preferred_location', 'like', '%' . $search_string . '%')
                ->orWhere('current_ctc', 'like', '%' . $search_string . '%')
                ->orWhere('expected_ctc', 'like', '%' . $search_string . '%')
                ->orWhere('notice_period', 'like', '%' . $search_string . '%')
                ->orWhereHas('address', function ($query) use ($search_string) {
                    $query->where('line_1', 'like', '%' . $search_string . '%')
                        ->orWhere('line_2', 'like', '%' . $search_string . '%')
                        ->orWhere('city', 'like', '%' . $search_string . '%')
                        ->orWhere('state', 'like', '%' . $search_string . '%')
                        ->orWhere('zip', 'like', '%' . $search_string . '%');
                })
                ->orWhereHas('educations', function ($query) use ($search_string) {
                    $query->where('degree', 'like', '%' . $search_string . '%')
                        ->orWhere('university', 'like', '%' . $search_string . '%')
                        ->orWhere('year', 'like', '%' . $search_string . '%')
                        ->orWhere('grade', 'like', '%' . $search_string . '%');
                })->orWhereHas('experiences', function ($query) use ($search_string) {
                    $query->where('company', 'like', '%' . $search_string . '%')
                        ->orWhere('designation', 'like', '%' . $search_string . '%')
                        ->orWhere('from', 'like', '%' . $search_string . '%')
                        ->orWhere('to', 'like', '%' . $search_string . '%');
                })->orWhereHas('languages', function ($query) use ($search_string) {
                    $query->where('name', 'like', '%' . $search_string . '%');
                })
                ->orWhereHas('technicalExperiences', function ($query) use ($search_string) {
                    $query->where('name', 'like', '%' . $search_string . '%');
                });
        }
        return $query;
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $application_data = [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'gender' => $data['gender'],
                'preferred_location' => $data['preferred_location'],
                'current_ctc' => $data['current_ctc'],
                'expected_ctc' => $data['expected_ctc'],
                'notice_period' => $data['notice_period'],
            ];
            $application = $this->model->create($application_data);
            $application->address()->create($data['address']);
            foreach ($data['educations'] as $education) {
                $application->educations()->create($education);
            }
            foreach ($data['experiences'] as $experience) {
                $application->experiences()->create($experience);
            }
            foreach ($data['languages'] as $language) {
                $application->languages()->create($language);
            }
            foreach ($data['technicalExperiences'] as $technicalExperience) {
                $application->technicalExperiences()->create($technicalExperience);
            }
            DB::commit();
            return $application;
        } catch (\Exception $exception) {
            DB::rollBack();
            log_error($exception);
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            DB::beginTransaction();
            $application = $this->model->find($id);
            $application->update($data);
            $application->address()->update($data['address']);
            $application->educations()->delete();
            foreach ($data['educations'] as $education) {
                $application->educations()->create($education);
            }
            $application->experiences()->delete();
            foreach ($data['experiences'] as $experience) {
                $application->experiences()->create($experience);
            }
            $application->languages()->delete();
            foreach ($data['languages'] as $language) {
                $application->languages()->create($language);
            }
            $application->technicalExperiences()->delete();
            foreach ($data['technicalExperiences'] as $technicalExperience) {
                $application->technicalExperiences()->create($technicalExperience);
            }
            DB::commit();
            return $application;
        } catch (\Exception $exception) {
            DB::rollBack();
            log_error($exception);
            return false;
        }
    }

}
