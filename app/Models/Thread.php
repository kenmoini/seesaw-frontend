<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
  use HasFactory, SoftDeletes;

  protected $dates = ['ended_at', 'created_at', 'updated_at', 'deleted_at'];
  
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function posts()
  {
    return $this->hasMany(Post::class);
  }
}
