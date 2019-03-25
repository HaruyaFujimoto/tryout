<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'Laravel',
            'PHP',
            'Python',
            'Django',
            'Flask',
            'javascript',
            'View.js',
            'React',
            'Angular',
            'Java',
            'C/C++',
            'Ruby',
            'Ruby on Rails',
        ];
        foreach ($items as $item) {
            $skill = new Skill;
            $skill->name = $item;
            $skill->save();
        }
    }
}
