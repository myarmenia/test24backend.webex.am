<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestResource;
use App\Models\Test;
use App\Services\DeleteRecordService;
use Illuminate\Http\Request;
use App\Services\GetAuthUserTestsService;
use Illuminate\Support\Facades\Auth;

class DeleteRecordController extends Controller
{
    public $getAuthUserTestsService;

    public function __construct(GetAuthUserTestsService $getAuthUserTestsService){

        $this->getAuthUserTestsService = $getAuthUserTestsService;

    }

       public function delete($id){
        try{
            
            $table="tests";

            $data=DeleteRecordService::deleteRecord($id,$table);

            if($data){
                $data = $this->getAuthUserTestsService->getOption();
                return $this->sendResponse(TestResource::collection($data),'success');

            }

        }catch (\Exception $e) {

            return $e->getMessage();
        }




    }
}
