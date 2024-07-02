<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestResource;
use App\Models\Test;
use Illuminate\Http\Request;

class GetAllTestController extends BaseController
{
    //
    protected $model;
    public function __construct(Test $model){

        $this->model = $model;

    }
    public function index(Request $request){
        $builder = $this->model;



        $data = $this->model
                  ->filter($request->all())
                  ->get();

        return $this->sendResponse(TestResource::collection($data),'success');

    }
}
