<?php
namespace App\Services;

use App\Interfaces\SendMessageInterface;
use App\Mail\MailToOrganization;
use App\Models\Category;
use Google\Service\MyBusinessBusinessInformation\Resource\Categories;
use Illuminate\Support\Facades\Mail;

class ContactService implements  SendMessageInterface
{
    public function sendMessage($request){

            $test_categories = Category::with('category_translations')->get();;
// dd($test_categories);
            return  Mail::to('armine@webex.am')->send(new MailToOrganization([
                "name" => $request->name,
                "email" => $request->email,
                "message" => $request->message,
                "educational_test" => $test_categories
            ]

            ));
            // dd($response);


        // return  $this->sendResponse( $response,'Ձեր պատասխանը հաջողությամբ ուղարկվել է');



    }
}

