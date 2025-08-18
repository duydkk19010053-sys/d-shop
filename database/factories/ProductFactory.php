<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->randomElement([
            'Chuột Gaming Asus TUF M4 Wireless',
            'Màn hình Asus TUF GAMING VG259Q3A 25" Fast IPS 180Hz Gsync chuyên game',
            'Ghế Gaming E-Dra Citizen EGC236',
            'Bàn phím cơ Corsair K100 RGB',
            'Tai nghe Sony WH-1000XM4',
            'Laptop Dell XPS 13',
            'PC GVN Intel i3-12100F/ VGA RTX 3050',
            'Bàn phím cơ Logitech G Pro X',
            'Chuột chơi game Razer DeathAdder'
        ]);
        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 1000),
            'category_id' => Category::inRandomOrder()->first()->id,
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 100000, 5000000),
            'stock' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['in_stock', 'out_of_stock']),
            'unit' => $this->faker->randomElement(['cái', 'set', 'bộ'])
        ];
    }
}
