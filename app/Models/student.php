<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model implements Authenticatable
{
    use AuthenticableTrait;
    use HasFactory;
    protected $guarded = [];

    
}
