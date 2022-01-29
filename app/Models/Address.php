<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'line_1', 'line_2', 'city', 'state', 'zip', 'application_id'
    ];

    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id');
    }
}
