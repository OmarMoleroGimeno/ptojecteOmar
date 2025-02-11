<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
  use HasFactory;

  protected $fillable = ['user_id', 'total', 'date',];

  public function user()
    {
        return $this->belongsTo(User::class);
    }
  public function details()
    {
        return $this->hasMany(Detail::class);
    }
}
