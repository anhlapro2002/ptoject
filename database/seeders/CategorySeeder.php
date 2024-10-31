<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $category = [
                ['id' => 1, 'NAME' => 'MACBOOK'],
                ['id' => 2, 'NAME' => 'MSI'],
                ['id' => 3, 'NAME' => 'DELL'],
                ['id' => 4, 'NAME' => 'ASUS'],
                ['id' => 5, 'NAME' => 'HP'],
                ['id' => 6, 'NAME' => 'LENOVO'],
                ['id' => 7, 'NAME' => 'ACER'],
                ['id' => 8, 'NAME' => 'LG'],
                ['id' => 9, 'NAME' => 'HUAWEI'],
                ['id' => 10, 'NAME' => 'RAZER']
            ];
    
            DB::table('category')->insert($category);
        }
    }
}
