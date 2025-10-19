<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SNS extends Model
{
    protected $table = 'sns';

    protected $fillable = ['post', 'username', 'identifier_id'];
    use HasFactory;

    public function identifier(){
        return $this->belongsTo(Identifier::class);
    }
}