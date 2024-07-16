<?php

namespace Database\Seeders;

use App\Models\AnswerTypeTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerTypeTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Answertypetranslation::create( [
            'id'=>1,
            'answer_type_id'=>1,
            'text'=>'Only one answer is correct',
            'lang'=>'en',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );



            AnswerTypeTranslation::create( [
            'id'=>2,
            'answer_type_id'=>1,
            'text'=>'Только один ответ правильный',
            'lang'=>'ru',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );



            Answertypetranslation::create( [
            'id'=>5,
            'answer_type_id'=>2,
            'text'=>'More than one correct answer',
            'lang'=>'en',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );



            Answertypetranslation::create( [
            'id'=>6,
            'answer_type_id'=>2,
            'text'=>'Более одного правильного ответа',
            'lang'=>'ru',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
    }
}
