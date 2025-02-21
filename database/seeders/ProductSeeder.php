<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = DB::table('categories')->pluck('id', 'name');

        DB::table('products')->insert([
            [
                'name' => 'Хрупкий вазон',
                'description' => 'Красивый стеклянный вазон.',
                'price' => 1299.99,
                'category_id' => $categories['хрупкий'],
            ],
            [
                'name' => 'Железная гиря',
                'description' => 'Гиря 16 кг для тренировок.',
                'price' => 3500.00,
                'category_id' => $categories['тяжелый'],
            ],
            [
                'name' => 'Картонная коробка',
                'description' => 'Прочная коробка для хранения.',
                'price' => 299.50,
                'category_id' => $categories['легкий'],
            ],
            [
                'name' => 'Фарфоровая чашка',
                'description' => 'Изящная чашка для чая.',
                'price' => 899.99,
                'category_id' => $categories['хрупкий'],
            ],
            [
                'name' => 'Рюкзак',
                'description' => 'Лёгкий городской рюкзак.',
                'price' => 1799.00,
                'category_id' => $categories['легкий'],
            ],
            [
                'name' => 'Чугунная сковорода',
                'description' => 'Толстостенная сковорода для жарки.',
                'price' => 2499.99,
                'category_id' => $categories['тяжелый'],
            ],
        ]);
    }
}
