<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resource extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function coursename()
    // {
    //     return $this->belongsTo(course_detail::class, 'course_id', 'id');
    // }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d M,Y');
    }
    public function course()
    {
        return $this->belongsTo(course_detail::class, 'course_id', 'id');
    }
}
