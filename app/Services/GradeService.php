<?php
namespace App\Services;

use App\Interfaces\GetOptionServiceInterface;
use App\Models\Grade;

class GradeService implements GetOptionServiceInterface
{
    public function getOption(){
        return Grade::all();
    }
}

