<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    use HasFactory;

    protected $table = 'education_details';

    protected $fillable = [
        'application_id', 'degree', 'university', 'year', 'grade'
    ];

    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id');
    }
}
