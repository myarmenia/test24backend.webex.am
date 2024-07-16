<?php

namespace Database\Seeders;

use App\Models\GradeTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeTranslationSeede extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gradetranslation::create( [
            'id'=>1,
            'grade_id'=>1,
            'text'=>'Lowest',
            'lang'=>'en',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );



            Gradetranslation::create( [
            'id'=>2,
            'grade_id'=>1,
            'text'=>'Самый низкий',
            'lang'=>'ru',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );


            Gradetranslation::create( [
            'id'=>3,
            'grade_id'=>2,
            'text'=>'Medium',
            'lang'=>'en',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );


            Gradetranslation::create( [
            'id'=>4,
            'grade_id'=>2,
            'text'=>'Середина',
            'lang'=>'ru',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );



            Gradetranslation::create( [
            'id'=>5,
            'grade_id'=>3,
            'text'=>'Highest',
            'lang'=>'en',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );



            GradeTranslation::create( [
            'id'=>6,
            'grade_id'=>3,
            'text'=>'Наибольший',
            'lang'=>'ru',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
    }
}
