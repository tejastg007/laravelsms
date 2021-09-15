<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batch_detail extends Model
{
    public $timestamps = false;
    protected $fillable = ['start_time', 'end_time'];
    use HasFactory;

    public function getStartTimeAttribute($time)
    {
        return  date('g:iA', strtotime(date('Y-m-d') . ' ' . $time));
    }
    public function getEndTimeAttribute($time)
    {
        return  date('g:iA', strtotime(date('Y-m-d') . ' ' . $time));
    }
    public function getstudents()
    {
        return $this->hasMany(registration::class, 'batch_id', 'id');
    }
}
