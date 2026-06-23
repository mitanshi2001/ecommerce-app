<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $electronics = Category::create([
            'name' => 'Electronics',
            'description' => 'Latest gadgets, audio, and smart devices.'
        ]);

        $fashion = Category::create([
            'name' => 'Fashion',
            'description' => 'Trendy clothing and footwear for all seasons.'
        ]);

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'Aura Noise-Canceling Headphones',
            'description' => 'Experience premium sound quality with our Aura wireless headphones. Features active noise cancellation, 30-hour battery life, and ultra-comfortable ear cushions.',
            'price' => 249.99,
            'stock_quantity' => 50,
            'image' => 'products/headphones.png',
        ]);

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'Nexus Smartwatch Series X',
            'description' => 'Stay connected and track your fitness with the Nexus Smartwatch. Features a brilliant OLED display, heart rate monitoring, and GPS.',
            'price' => 199.50,
            'stock_quantity' => 30,
            'image' => 'products/smartwatch.png',
        ]);

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'Adventure X10 Action Camera',
            'description' => 'Capture every moment in stunning 4K ultra HD. The Adventure X10 is waterproof, shockproof, and ready for any extreme sport.',
            'price' => 129.00,
            'stock_quantity' => 100,
            'image' => 'products/camera.png',
        ]);

        Product::create([
            'category_id' => $fashion->id,
            'name' => 'Classic Vintage Leather Jacket',
            'description' => 'A timeless brown leather jacket crafted from premium materials. Features a comfortable fit and durable brass zippers. Perfect for any season.',
            'price' => 350.00,
            'stock_quantity' => 15,
            'image' => 'products/jacket.png',
        ]);

        Product::create([
            'category_id' => $fashion->id,
            'name' => 'Minimalist Canvas Sneakers',
            'description' => 'Step out in style with these clean, versatile white canvas sneakers. Designed for all-day comfort and a sleek, modern look.',
            'price' => 65.00,
            'stock_quantity' => 200,
            'image' => 'products/sneakers.png',
        ]);
    }
}
