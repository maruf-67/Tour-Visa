<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Homepage;

class HomepageSeeder extends Seeder
{
    public function run()
    {
        Homepage::create([
            'title' => 'Example Title',
            'fav_icon' => '',
            'logo' => '',
            'description' => 'Example description.',
            'keywords' => 'example, keywords, SEO',
            'head_tag' => '<meta name="description" content="Example meta description">',
            'author_name' => 'John Doe',
        ]);
    }
}
