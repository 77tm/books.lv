<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $genres = [
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'Art'],
            ['name' => 'Autobiography'],
            ['name' => 'Biography'],
            ['name' => 'Business'],
            ['name' => 'Children\'s'],
            ['name' => 'Comics'],
            ['name' => 'Cookbooks'],
            ['name' => 'Crime'],
            ['name' => 'Drama'],
            ['name' => 'Fantasy'],
            ['name' => 'Fiction'],
            ['name' => 'History'],
            ['name' => 'Horror'],
            ['name' => 'Humor'],
            ['name' => 'Manga'],
            ['name' => 'Mystery'],
            ['name' => 'Nonfiction'],
            ['name' => 'Poetry'],
            ['name' => 'Psychology'],
            ['name' => 'Romance'],
            ['name' => 'Science'],
            ['name' => 'Science Fiction'],
            ['name' => 'Self-help'],
            ['name' => 'Suspense'],
            ['name' => 'Thriller'],
            ['name' => 'Travel'],
            ['name' => 'Young Adult'],
        ];

        DB::table('genres')->insert($genres);
    }
}
