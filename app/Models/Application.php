<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'applications';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'gender', 'preferred_location', 'current_ctc', 'expected_ctc', 'notice_period'
    ];

    protected $appends = [
        'name',
    ];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function address()
    {
        return $this->hasOne('App\Models\Address', 'application_id');
    }

    public function educations()
    {
        return $this->hasMany('App\Models\EducationDetail', 'application_id');
    }

    public function experiences()
    {
        return $this->hasMany('App\Models\Experience', 'application_id');
    }

    public function languages()
    {
        return $this->hasMany('App\Models\Language', 'application_id');
    }

    public function technicalExperiences()
    {
        return $this->hasMany('App\Models\TechnicalExperience', 'application_id');
    }
}
