<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteRecordService
{

    public static  function deleteRecord($id,$table){

        $query = DB::table($table)->where(['id'=> $id,'user_id'=>Auth::id()])->delete();

        return true;
    }

}


