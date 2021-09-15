<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee_detail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function studname()
    {
        return $this->belongsTo(registration::class, 'student_id', 'id');
    }

    public function getPaidOnAttribute($date)
    {
        return empty($date) ? null : Carbon::parse($date)->format('d-M-Y');
    }
}
