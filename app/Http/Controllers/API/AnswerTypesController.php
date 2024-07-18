<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AnswerTypeResource;
use App\Interfaces\GetOptionServiceInterface;
use App\Models\AnswerType;
use Illuminate\Http\Request;

class AnswerTypesController extends BaseController
{
    protected $answerTypeService;
    public function __construct(GetOptionServiceInterface $answerTypeService)
    {

        $this->answerTypeService = $answerTypeService;

    }
    public function index()
    {

        // $data =  $this->answerTypeService->getOption();
     $data=AnswerType::all();
        return $this->sendResponse(AnswerTypeResource::collection($data),'success');

    }

}
