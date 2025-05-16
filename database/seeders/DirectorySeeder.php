<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ServiceProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Design',
            'Development',
            'Marketing',
            'Consulting',
            'Photography'
        ];

        foreach ($categories as $catName) {
            $category = Category::create(['name' => $catName]);

            ServiceProvider::factory()->count(20)->create([
                'category_id' => $category->id
            ]);
        }
    }
}
