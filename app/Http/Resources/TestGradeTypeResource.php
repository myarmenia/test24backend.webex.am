<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestGradeTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "test_id"=>$this->test_id,
            "test_grade_id"=>$this->test_grade_id,
            "low_grade"=>$this->low_grade,
            "high_grade"=>$this->high_grade,
            "description"=> $this->description
           
        ];
    }
}
