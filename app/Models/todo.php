<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;
    protected $fillable = ['task', 'status'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y , g:i A');
    }
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-M-Y , g:i A');
    }
}
