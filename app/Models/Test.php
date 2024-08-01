<?php

namespace App\Models;

use App\Trait\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory,FilterTrait;
    protected $guarded = [];
    protected $table = 'tests';
    protected $FilterFields = ['category_id'];
    protected $hasRelation = ['categories'];

    public function categories(){

        return $this->belongsTo(Category::class,'category_id');

    }
    public function answer_types(){
        return $this->belongsTo(AnswerType::class,'answer_type_id');

    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');

    }
    public function test_grade_types(){
        return $this->hasMany(TestGradeType::class);
    }

}
