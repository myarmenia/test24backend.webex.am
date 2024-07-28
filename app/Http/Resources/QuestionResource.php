<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            "id" => $this->id,
            "test_id" => $this->test_id,
            "text" => $this->text,
            "path"=>isset($this->path) ? url('').Storage::disk('local')->url($this->files->path) : null,
            "answer_options" =>AnswerOptionsResource::collection($this->answer_options),
        ];
    }
}
