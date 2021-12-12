<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert(['name'=> 'Gia Dụng']);
        Category::insert(['name'=> 'Công Nghệ']);
        Category::insert(['name'=> 'Thực Phẩm']);
    }
}
