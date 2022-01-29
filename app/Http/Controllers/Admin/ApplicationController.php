<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ApplicationRepository;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function view($id)
    {
        $application = (new ApplicationRepository())->getById($id, [
            'address', 'educations', 'experiences', 'languages', 'technicalExperiences'
        ]);
        return view('admin.applications.view', [
            'application' => $application
        ]);
    }

    public function edit($id)
    {
        return view('admin.applications.edit', ['id' => $id]);
    }

}
