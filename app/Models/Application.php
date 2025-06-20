<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id',
        'internship_id',
        'company_id',
        'status',
        'slug',
        'pdf'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
