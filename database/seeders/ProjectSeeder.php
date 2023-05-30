<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str; // to import!

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->sub_title = $faker->text(120);
            $newProject->description = $faker->text(300);
            $newProject->image = $faker->url();
            $newProject->slug = Str::slug($newProject->title, '-'); // use: class->Str & call: method->'slug'
            $newProject->save();
        }
    }
}
