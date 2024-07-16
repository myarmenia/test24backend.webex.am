<?php

namespace Database\Seeders;

use App\Models\AnswerType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnswerType::create( [
            'id'=>1,
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );

            Answertype::create( [
            'id'=>2,
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
    }
}
