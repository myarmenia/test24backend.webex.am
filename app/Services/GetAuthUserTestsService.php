<?php
namespace App\Services;

use App\Abstract\OptionAbstractClass;
use App\Models\AnswerType;

class GetAuthUserTestsService extends OptionAbstractClass
{
    public function getOption()
    {

        return auth()->user()->tests()->orderBy('created_at', 'desc')->get();
    }
   

}
