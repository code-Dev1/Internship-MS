<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     protected $fillable =[
        'user_id',
        'name',
        'description',
        'website',
        'slug'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function internships(){
        return $this->hasMany(Internship::class);
    }

    public function applications(){
        return $this->belongsTo(Application::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
