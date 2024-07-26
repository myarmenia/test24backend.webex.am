<?php
namespace App\Services;

use App\Interfaces\SendMessageInterface;
use App\Mail\MailToOrganization;
use App\Mail\SendEmail;
use App\Models\Category;
use Google\Service\MyBusinessBusinessInformation\Resource\Categories;
use Illuminate\Support\Facades\Mail;

class ContactService implements  SendMessageInterface
{
    public function sendMessage($request){

            $test_categories = Category::with('category_translations')->get();;
            return  Mail::to('armine.khachatryan1982@gmail.com')->send(new SendEmail([
            // return  Mail::to('armine.khachatryan1982@gmail.com')->send(new MailToOrganization([
                "name" => $request->name,
                "email" => $request->email,
                "message" => $request->message,
                "test_categories" => $test_categories,
                "test_types"=> __('messages.test_types')
            ]

            ));

    }
}

