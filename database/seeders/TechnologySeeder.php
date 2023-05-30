<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // to import!

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML', 'CSS', 'SASS', 'BOOTSTRAP', 'JAVASCRIPT', 'PHP', 'VUE', 'LARAVEL'];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->type = $technology;
            $newTechnology->slug = Str::slug($technology, '-');
            $newTechnology->save();
        }
    }
}
