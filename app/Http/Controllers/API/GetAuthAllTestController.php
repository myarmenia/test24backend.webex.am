<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestResource;
use App\Services\GetAuthUserTestsService;
use Illuminate\Http\Request;

class GetAuthAllTestController extends BaseController
{
    public $getAuthUserTestsService;
    public function __construct(GetAuthUserTestsService $getAuthUserTestsService){

        $this->getAuthUserTestsService = $getAuthUserTestsService;

    }
    public function index(){

        $data = $this->getAuthUserTestsService->getOption();

        return $this->sendResponse(TestResource::collection($data),'success');

    }
}
