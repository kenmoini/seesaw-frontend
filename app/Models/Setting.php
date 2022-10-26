<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['ended_at', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'key',
      'value',
      'friendly_name',
      'description',
      'type',
      'options',
      'group',
      'order',
      'validation',
    ];

    /**
     * The functino to get a specific setting by key.
     *
     * @param string $key
     */
    public static function getSetting($key) {
      return self::where('key', $key)->first();
    }

}
