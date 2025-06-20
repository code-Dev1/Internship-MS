<?php

namespace App\Models;

use App\Enums\Cities;
use App\Enums\Gengers;
use App\Enums\WorkTime;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'slug',
        'start_date',
        'end_date',
        'location',
        'gender',
        'requirements',
        'email',
        'education',
        'time'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    protected $casts = [
        'location' => Cities::class,
        'gender' => Gengers::class,
        'time' => WorkTime::class,
        'start_date' => 'date',
        'end_date' => 'date'
    ];
}
