<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GradeResource;
use App\Interfaces\GetOptionServiceInterface;
use Illuminate\Http\Request;

class GetGradeController extends BaseController
{
    protected $gradeService;
    public function __construct(GetOptionServiceInterface $gradeService){

        $this->gradeService = $gradeService;
    }
    public function index(){
        $data=$this->gradeService->getOption();

        return $this->sendResponse(GradeResource::collection($data),'success');
    }
}
