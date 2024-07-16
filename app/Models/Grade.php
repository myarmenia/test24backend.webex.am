<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function translation($lang){

        return $this->hasOne(GradeTranslation::class)->where('lang', $lang)->first();
     }


}
