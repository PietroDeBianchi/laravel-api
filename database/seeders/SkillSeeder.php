<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // to import!
use App\Models\Skill; // to import!

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            'Front-End', 'Back-End', 'Full-Stack', 'Cyber Security', 'Data Science', 'Software Engineer'
        ];

        foreach ($skills as $skill) {
            $newSkill = new Skill();
            $newSkill->type = $skill;
            $newSkill->slug = Str::slug('skill', '-');
            $newSkill->save();
        }
    }
}
