<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetTestForEditingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this->test_grade_types);
        return [
            "id" =>$this->id,
            "category_id"=>$this->category_id,
            "name"=>$this->name,
            "description"=>$this->descripption,
            "time_in_seconds"=>$this->time_in_seconds,
            "test_grade_types"=>TestGradeTypeResource::collection($this->test_grade_types),
            "question_count"=>$this->question_count,
            "link"=>$this->link,
            "answer_type_id"=>$this->answer_type_id,
            "answer_type_name" =>$this->answer_types->translation(app()->getLocale())->text,
            "questions"=>QuestionResource::collection($this->questions),
            "route"=> url('').'/api/test/'.$this->link
        ];
    }
}
