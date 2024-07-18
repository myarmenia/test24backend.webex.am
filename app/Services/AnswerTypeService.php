<?php
namespace App\Services;

use App\Abstract\OptionAbstractClass;
use App\Interfaces\GetOptionServiceInterface;
use App\Models\AnswerType;

class AnswerTypeService extends OptionAbstractClass
{
    public function getOption()
    {

        return AnswerType::all();
    }

}
