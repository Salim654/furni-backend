<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'title' => '5 Tips to Choose the Perfect Sofa for Your Living Room',
                'excerpt' => 'Choosing the right sofa can transform your living space. Here are five tips to help you select the perfect one.',
                'content' => 'When selecting a sofa, consider the size of your room, the style of your existing furniture, the material, and your lifestyle. Remember to balance comfort and aesthetics. Explore different colors, fabrics, and shapes to match your living room decor.',
                'image' => 'blogs/7cleNanehK3BTtOrJ11cbLMurY66QTevXCADSuTW.jpg',
                'user_id' => 1,
            ],
            [
                'title' => 'Modern vs Classic Furniture: Which One Fits Your Home?',
                'excerpt' => 'Deciding between modern and classic furniture styles can be tricky. Here’s a guide to help you make the right choice.',
                'content' => 'Modern furniture focuses on minimalism, clean lines, and functionality, while classic furniture brings elegance, ornate details, and a timeless feel. Consider your home architecture, personal style, and maintenance preferences before deciding.',
                'image' => 'blogs/7cleNanehK3BTtOrJ11cbLMurY66QTevXCADSuTW.jpg',
                'user_id' => 1,
            ],
            [
                'title' => 'Top 10 Space-Saving Furniture Ideas for Small Apartments',
                'excerpt' => 'Maximize your small apartment with these clever space-saving furniture solutions.',
                'content' => 'From foldable tables and sofa beds to modular shelving and hidden storage, space-saving furniture can make your small home both functional and stylish. Learn how to choose multi-purpose pieces that suit your lifestyle.',
                'image' => 'blogs/7cleNanehK3BTtOrJ11cbLMurY66QTevXCADSuTW.jpg',
                'user_id' => 1,
            ],
            [
                'title' => 'How to Mix and Match Furniture for a Cohesive Look',
                'excerpt' => 'Mixing furniture styles can be tricky. Follow these tips for a harmonious interior.',
                'content' => 'Start by choosing a consistent color palette and balancing materials like wood, metal, and fabric. Don’t be afraid to combine modern and vintage pieces, but ensure they complement each other in scale and proportion.',
                'image' => 'blogs/7cleNanehK3BTtOrJ11cbLMurY66QTevXCADSuTW.jpg',
                'user_id' => 1,
            ],
            [
                'title' => 'Sustainable Furniture: Eco-Friendly Choices for Your Home',
                'excerpt' => 'Eco-conscious furniture is not only good for the planet but also adds a unique charm to your home.',
                'content' => 'Look for furniture made from reclaimed wood, bamboo, or recycled materials. Choose durable products that last longer and consider local artisans to reduce your carbon footprint.',
                'image' => 'blogs/7cleNanehK3BTtOrJ11cbLMurY66QTevXCADSuTW.jpg',
                'user_id' => 1,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create([
                'title' => $blog['title'],
                'slug' => Str::slug($blog['title']),
                'excerpt' => $blog['excerpt'],
                'content' => $blog['content'],
                'image' => $blog['image'],
                'user_id' => $blog['user_id'],
            ]);
        }
    }
}
