<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $guarded = [];
    public function getRegistrationDateAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }
    public function getCourseStartDateAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }
    public function getCourseEndDateAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y');
    }

    public function course()
    {
        return $this->belongsTo(course_detail::class, 'course_id', 'id');
    }
    public function batch()
    {
        return $this->belongsTo(batch_detail::class, 'batch_id', 'id');
    }

    public function feedetail()
    {
        return $this->hasMany(fee_detail::class, 'student_id', 'id');
    }
}
