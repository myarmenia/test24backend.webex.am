<?php

namespace App\Services;

use Dotenv\Util\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileUploadService
{

    public static function upload(array|object $data, string $folder_path)
    {
dd($data);
        $filename = md5(microtime()). '.' .$data->getClientOriginalExtension();
        // $filename = $data->getClientOriginalName();

        $path = Storage::disk('local')->putFileAs(
          'public/' . $folder_path,
          $data,
          $filename
        );

        return $path;

    }

    public static function get_file(Request $request)
    {
        $path = $request['path'] ?? 'public/null_image.png';
        return response()->file(Storage::path($path));
    }


    public  static function  base64($id, $file){


        // first explode as "," (data:image/jpeg;base64,)
    $file_base_explode = explode(",",$file);
// dd($file_base_explode);
      // second we explode  as ";"(data:image/jpeg)
      $file_base_explode_first_argument = explode(";", $file_base_explode[0]);
    //   dd($file_base_explode_first_argument);
    //   dd($file_base_explode[0]);
    // third we explode  for geting  jpeg  extention
// dump(explode("/", $file_base_explode_first_argument[0]));

    $extention = explode("/", $file_base_explode_first_argument[0])[1];
    // $extention="jpg";
        if(in_array($extention, ['jpeg','jpg','png']))
        {



        // creating  $name for saving file  in database  in portfolio_pic column
        $name = time().rand(1,100).'.'.$extention;
        // via  file_put_contents  we save the data which is a data:image/jpeg;base64, and in the folder we save data via concating  name
        // dd(base64_decode($file_base_explode[1]));
        $path='public/question/'.$id.'/'.$name;
// dd($file_base_explode[1]);
        $image_file = base64_decode($file_base_explode[1]);
        // dd($image_file);
        // file_put_contents('test/'.$id.'/'.$name, base64_decode($file_base_explode[1]));
            Storage::disk('local')->put($path,$image_file);

            $file_path_array=[];
            $file_path_array['name'] = $name;
            $file_path_array['path'] = $path;
            $file_path_array['image_file'] = $image_file;
// dd($file_path_array);
            return $file_path_array;
        }else{

            return false;

        }

    }


}
