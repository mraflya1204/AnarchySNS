<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identifier extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = bin2hex(random_bytes(32));
            }
        });
    }

    public function sns()
    {
        return $this->hasMany(SNS::class);
    }
}