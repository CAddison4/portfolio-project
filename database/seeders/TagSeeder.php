<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);
        Tag::create([
            'name' => 'React',
            'slug' => 'react',
        ]);
        Tag::create([
            'name' => 'Node JS',
            'slug' => 'node-js',
        ]);

        Tag::create([
            'name' => 'C#',
            'slug' => 'c-sharp',
        ]);

        Tag::create([
            'name' => 'JavaScript',
            'slug' => 'javascript',
        ]);

        Tag::create([
            'name' => 'HTML',
            'slug' => 'html',
        ]);

        Tag::create([
            'name' => 'CSS',
            'slug' => 'css',
        ]);

        Tag::create([
            'name' => 'SQL',
            'slug' => 'sql',
        ]);

        Tag::create([
            'name' => 'MongoDB',
            'slug' => 'mongodb',
        ]);

        Tag::create([
            'name' => 'MySQL',
            'slug' => 'mysql',
        ]);

    }
}
