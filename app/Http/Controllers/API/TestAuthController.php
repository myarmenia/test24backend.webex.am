<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GetTestForEditingResource;
use App\Models\TestGradeType;
use App\Services\GetAuthUserTestsService;
use App\Services\TestUpdateService;
use Illuminate\Http\Request;

class TestAuthController extends BaseController
{
    /**
     * Display a listing of the resource.
     */

     public $getAuthUserTestsService;
     public $testUpdateService;
     public function __construct(GetAuthUserTestsService $getAuthUserTestsService, TestUpdateService $testUpdateService){

         $this->getAuthUserTestsService = $getAuthUserTestsService;
         $this->testUpdateService = $testUpdateService;

     }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = auth()->user()->tests->find($id);

        return $this->sendResponse(new GetTestForEditingResource($data),'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $responce = $this->testUpdateService->update($request,$id);
// dd($responce);
        return $this->sendResponse(new GetTestForEditingResource($responce),'success');
    }

}
