<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function questions(){
        return $this->belongsTo(Question::class,'question_id');
    }
}
