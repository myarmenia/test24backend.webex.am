<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded=[];


	protected $table = 'questions';

    public function answer_options(){

        return $this->hasMany(AnswerOption::class);
    }
    public function files(){
        return $this->hasOne(File::class);
    }
}
