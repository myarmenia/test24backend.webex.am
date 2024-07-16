<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeede extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grade::create( [
            'id'=>1,
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );

            Grade::create( [
            'id'=>2,
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );

            Grade::create( [
            'id'=>3,
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
    }
}
