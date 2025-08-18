<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $categories = [
            ['name' => 'Ghế Gaming', 'slug' => 'gaming-chair', 'description' => 'Latest gaming chair trends', 'image' => 'uploads/categories/ghe-gaming.png'],
            ['name' => 'Tay cầm chơi game', 'slug' => 'game-controller', 'description' => 'Game controllers and accessories', 'image' => 'uploads/categories/tay-cam.png'],
            ['name' => 'Tai nghe Gaming', 'slug' => 'gaming-headset', 'description' => 'Gaming headsets and audio', 'image' => 'uploads/categories/tai-nghe.png'],
            ['name' => 'Chuột Gaming', 'slug' => 'gaming-mouse', 'description' => 'Gaming mice and accessories', 'image' => 'uploads/categories/chuot.png'],
            ['name' => 'Bàn phím Gaming', 'slug' => 'gaming-keyboard', 'description' => 'Gaming keyboards and accessories', 'image' => 'uploads/categories/ban-phim.png'],
            ['name' => 'Màn hình Gaming', 'slug' => 'gaming-monitor', 'description' => 'Gaming monitors and accessories', 'image' => 'uploads/categories/man-hinh.png'],
            ['name' => 'PC Gaming', 'slug' => 'gaming-pc', 'description' => 'Gaming PCs and accessories', 'image' => 'uploads/categories/pc-gaming.png'],
            ['name' => 'Phụ kiện Gaming', 'slug' => 'gaming-accessories', 'description' => 'Gaming accessories and peripherals', 'image' => 'uploads/categories/phu-kien.png'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
