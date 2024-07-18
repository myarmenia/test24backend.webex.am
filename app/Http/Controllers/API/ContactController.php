<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Interfaces\SendMessageInterface;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    protected $contactService;
    public function __construct(SendMessageInterface $contactService ){

        $this->contactService = $contactService;
    }
    public function index(Request $request){
        try{

            $response=$this->contactService->sendMessage($request);

            return $this->sendResponse($response,'Ձեր պատասխանը հաջողությամբ ուղարկվել է');
        }
        catch (\Exception $e) {

            return $e->getMessage();
        }




    }
    public function show(){
        return view('emails.mailToOrganization');
    }
}
