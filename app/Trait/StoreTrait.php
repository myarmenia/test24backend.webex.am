<?php
namespace App\Trait;

use App\Models\AnswerOption;
use App\Models\File;
use App\Models\Question;
use App\Models\TestGradeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

trait StoreTrait{

    abstract function model();
  public function itemStore(Request $request)
  {
    // dd(Auth()->user());
// dd($request->all());

    $data = $request->except(['file','grade_type', 'question']);
    $data['user_id'] = Auth()->id();
// dd($data);
    $className = $this->model();
// dd($className);
    if(class_exists($className)) {

      $model = new $className;
      $relation_foreign_key = $model->getForeignKey();
    //   dd($relation_foreign_key);
      $table_name = $model->getTable();

      $item = $model::create($data);

      if ($item) {
        if($request['grade_type']){

            $this->grade_type($item->id,$request['grade_type']);

        }
        if($request['question']){

            $this->question($item->id,$request['question']);
        }

        $link_code = Str::random(10);
        $item ->link = $link_code;
        $item->save();
        $returned_link = url('')."/test/".$link_code;

         return $returned_link;

      }
    }
  }
  public function  base64($id, $file){


    // first explode as "," (data:image/jpeg;base64,)
$file_base_explode = explode(",",$file);

  // second we explode  as ";"(data:image/jpeg)
  $file_base_explode_first_argument = explode(";", $file_base_explode[0]);
//   dd($file_base_explode[0]);
// third we explode  for geting  jpeg  extention

$extention=explode("/", $file_base_explode_first_argument[0])[1];
if(in_array($extention, ['jpeg','jpg','png']))
{



// creating  $name for saving file  in database  in portfolio_pic column
$name = time().rand(1,100).'.'.$extention;
// via  file_put_contents  we save the data which is a data:image/jpeg;base64, and in the folder we save data via concating  name
// dd(base64_decode($file_base_explode[1]));
$path='public/question/'.$id.'/'.$name;

$image_file = base64_decode($file_base_explode[1]);
// file_put_contents('test/'.$id.'/'.$name, base64_decode($file_base_explode[1]));
    Storage::disk('local')->put($path,$image_file);

    $file_path_array=[];
    $file_path_array['name'] = $name;
    $file_path_array['path'] = $path;
    $file_path_array['image_file'] = $image_file;

    return $file_path_array;

  }else{

    return false;

  }


  }
  public function grade_type($test_id,$grade_type){

    foreach($grade_type as $item){
         $item['test_id'] = $test_id;
        $test_grade_type = TestGradeType::create($item);

    }
    return true;

  }
  public function question($test_id,$questions){
// dd($test_id,$questions);
    foreach($questions as $question){



        $except_path = Arr::except($question, ['path']);

        $question['test_id'] = $test_id;

        // unset($question['file']);

        $data = array_diff_key($question, array_flip(['answer_option']));
        $data = array_diff_key($data, array_flip(['path']));
// dd($data);


        // unset($data['file']);

        $create_question = Question::create($data);
        // dd($create_question);
        if($create_question){

            if($file = $question['path'] ?? null) {
                // dd($file);


                $convert_image = $this->base64($create_question->id,$file);

                if($convert_image==false){

                  return false;

                }

                $create_file=File::create([
                        'question_id' => $create_question->id,
                        'name' => $convert_image['name'],
                        'path' => $convert_image['path'],
                    ]);

            }

            foreach($question['answer_option'] as $option){
                $option['question_id'] = $create_question->id;
                $answer_option = AnswerOption::create( $option);

            }
        }


    }
        return true;
  }




}
