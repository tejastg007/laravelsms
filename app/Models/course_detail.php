<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_detail extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'duration', 'registration_fee', 'course_fee', 'installments', 'version', 'status'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }

    public function getstudents()
    {
        return $this->hasMany(registration::class, 'course_id', 'id');
    }
    // public function multiplestudent()
    // {
    //     return $this->hasMany(registration::class, 'course_id', 'id');
    // }
}
