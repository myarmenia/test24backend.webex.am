<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create( [
            'id'=>1,
            'path'=>'public/categories/1/educational_test.png',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );

            Category::create( [
            'id'=>2,
            'path'=>'public/categories/1/phsychological_test.png',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );

            Category::create( [
            'id'=>3,
            'path'=>'public/categories/1/entertaining_test.png',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );

            Category::create( [
            'id'=>4,
            'path'=>'public/categories/1/other_test.png',
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );
    }
}
