<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cities extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    public $table = 'cities';
    protected $fillable = ['id', 'name', 'added_by'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
