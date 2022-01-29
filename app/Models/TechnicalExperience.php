<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalExperience extends Model
{
    use HasFactory;

    protected $table = 'technical_experiences';

    protected $fillable = [
        'application_id', 'name', 'experience'
    ];

    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id');
    }

}
