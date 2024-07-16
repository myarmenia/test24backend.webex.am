<?php
namespace App\Services;
use App\Interfaces\GetOptionServiceInterface;
use App\Models\AnswerType;

class AnswerTypeService implements GetOptionServiceInterface
{
    public function getOption()
    {
        return AnswerType::all();
    }

}
