<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestGradeType extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function tests(){
        return $this->belongsTo(Test::class,'test_id');
    }
}
