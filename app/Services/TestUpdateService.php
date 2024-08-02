<?php
namespace App\Services;

use App\Models\AnswerOption;
use App\Models\File;
use App\Models\Question;
use App\Models\TestGradeType;
use Illuminate\Support\Facades\Storage;


class TestUpdateService{

    public  function  update($request,$id){

        // dd($request->all(),$id);
        $data=$request->all();
        $test = auth()->user()->tests->find($id);
        // dd($test);
        // dd($data['questions']);
        // if($data['test_grade_types']){

        //     $test_grade_types=$this->test_grade_types($data['test_grade_types'], $id);
        // }
        if($data['questions']){
            $updated_question = $this->update_question($data['questions'], $id);


        }
        return auth()->user()->tests->find($id);




    }
    // public function test_grade_types($test_grade_types,$id){

    //     // dd($test_grade_types,$id);
    //     foreach($test_grade_types as $key=>$value){
    //         $test_grade_types=TestGradeType::find($key);
    //         $test_grade_types->update($value);
    //         $test_grade_types->save();


    //     }

    // }
    public function update_question($questions,$id){

        foreach($questions as $key=>$value){

            $get_question=Question::find($key);
            $get_question->text=$value['text'];
            $get_question->save();
            if($value['path']){

                $file_path = $this->update_file_path($value['path'],$key);

                if($value['answer_options']){


                    $answer_option=$this->question_answer_options($value['answer_options'] ,$key);

                }

            }


        }
    }

    public  function update_file_path($path,$question_id){

            $file = File::where('question_id', $question_id)->first();

            if($file){
                if (Storage::exists( $file->path)) {

                    Storage::delete($file->path);

                    $file->delete();
                  }
            }


            $table_name = "question";
            $convert_image = FileUploadService::base64($question_id,$path);

            if($convert_image==false){

                return false;

            }

              $create_file=File::create([
                      'question_id' => $question_id,
                      'name' => $convert_image['name'],
                      'path' => $convert_image['path'],
                  ]);
              return $create_file->id;







    }
    public function question_answer_options($answer_options,$id){

        foreach($answer_options as $key=>$value){

            $answer_options = AnswerOption::find($key);

            $answer_options->update($value);
            $answer_options->save();

        }

    }




}
