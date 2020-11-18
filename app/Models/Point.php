<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'latitude', 'longitude', 'address'];
    public function setNameAttribute($value)
    {
      $this->attributes['name'] = strtoupper($value);
    }
}
