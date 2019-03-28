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
            [ 'name' => 'Laravel' ],
            [ 'name' => 'PHP' ],
            [ 'name' => 'Python' ],
            [ 'name' => 'Django' ],
            [ 'name' => 'Flask' ],
            [ 'name' => 'javascript' ],
            [ 'name' => 'Vue.js' ],
            [ 'name' => 'React' ],
            [ 'name' => 'Angular' ],
            [ 'name' => 'Java' ],
            [ 'name' => 'C/C++' ],
            [ 'name' => 'Ruby' ],
            [ 'name' => 'Ruby on Rails' ],
        ];
        foreach ($items as $item) {
            $validator = \Validator::make($item, Skill::$rules);
            if ($validator->fails()) {
                continue;
            }
            $skill = new Skill;
            $skill->fill($item);
            $skill->save();
        }
    }
}
