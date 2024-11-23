<?php

namespace Database\Seeders;

use App\Models\Cast;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CastSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $casts = [
            ['name' => 'Robert Downey Jr.', 'age' => 58, 'bio' => 'Iron Man actor.'],
            ['name' => 'Chris Evans', 'age' => 42, 'bio' => 'Captain America actor.'],
            ['name' => 'Scarlett Johansson', 'age' => 39, 'bio' => 'Black Widow actress.'],
            ['name' => 'Chris Hemsworth', 'age' => 40, 'bio' => 'Thor actor.'],
            ['name' => 'Mark Ruffalo', 'age' => 56, 'bio' => 'Hulk actor.'],
        ];

        foreach ($casts as $cast) {
            Cast::create($cast);
        }
    }
}
