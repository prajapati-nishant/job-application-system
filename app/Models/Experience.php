<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experiences';

    protected $fillable = [
        'application_id', 'company', 'designation', 'from', 'to'
    ];

    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id');
    }
}
