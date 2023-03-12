<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
     protected function fakeHTMLParagraphs($count = 3) {
        $bodyArray = fake()->paragraphs($count);
        $body = '<p>' . join('</p></p>', $bodyArray ) . '</p>';
        return $body;
    }

    protected function fakeSlugGenerator($title) {
        $slug = Str::slug($title, '-');
        return $slug;
    }

     public function run()
    {
        Project::create([
            'title' => 'Portfolio Showcase',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(4),
            'slug' => $this->fakeSlugGenerator('Portfolio Showcase'),
            'category_id' => 3
        ]);
        Project::create([
            'title' => 'SSD Yearbook',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'slug' => $this->fakeSlugGenerator('SSD Yearbook'),
            'category_id' => 1
        ]);
        Project::create([
            'title' => 'Movie Mania',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(5),
            'slug' => $this->fakeSlugGenerator('Movie Mania'),
        ]);
        Project::create([
            'title' => 'News Site Homepage',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'slug' => $this->fakeSlugGenerator('News Site Homepage'),
            'category_id' => 2
        ]);
        Project::create([
            'title' => 'JavaScript Game',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'slug' => $this->fakeSlugGenerator('JavaScript Game'),
            'category_id' => 2
        ]);
        Project::create([
            'title' => 'iOS App',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'slug' => $this->fakeSlugGenerator('iOS App'),
        ]);
        Project::create([
            'title' => 'Android App',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'slug' => $this->fakeSlugGenerator('Android App'),
        ]);
        Project::create([
            'title' => 'Industry Project',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(6),
            'slug' => $this->fakeSlugGenerator('Industry Project'),
            'category_id' => 3
        ]);
    }


}
