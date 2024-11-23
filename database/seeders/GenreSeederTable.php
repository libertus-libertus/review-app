<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = ['Action', 'Drama', 'Comedy', 'Horror', 'Sci-Fi'];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}
