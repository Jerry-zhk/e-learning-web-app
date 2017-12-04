<?php

use Illuminate\Database\Seeder;

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
        	[
        		'name' =>'php',
        		'display_name' => 'PHP',
        		'type' => 'Programming Language'
        	],
        	[
        		'name' =>'javascript',
        		'display_name' => 'JavaScript',
        		'type' => 'Programming Language'
        	],
        	[
        		'name' =>'java',
        		'display_name' => 'Java',
        		'type' => 'Programming Language'
        	],
        	[
        		'name' =>'c',
        		'display_name' => 'C',
        		'type' => 'Programming Language'
        	],
        	[
        		'name' =>'cpp',
        		'display_name' => 'C++',
        		'type' => 'Programming Language'
        	],
        	[
        		'name' =>'python',
        		'display_name' => 'Python',
        		'type' => 'Programming Language'
        	],
        	[
        		'name' =>'laravel',
        		'display_name' => 'Laravel',
        		'type' => 'Framework'
        	],
        	[
        		'name' =>'angularjs',
        		'display_name' => 'AngularJs',
        		'type' => 'Framework'
        	],
        	[
        		'name' =>'vuejs',
        		'display_name' => 'VueJs',
        		'type' => 'Framework'
        	],
        	[
        		'name' =>'reactjs',
        		'display_name' => 'ReactJs',
        		'type' => 'Framework'
        	],
        	[
        		'name' =>'mysql',
        		'display_name' => 'MySQL',
        		'type' => 'Database'
        	],
        	[
        		'name' =>'mongodb',
        		'display_name' => 'MongoDB',
        		'type' => 'Database'
        	],
        	[
        		'name' =>'git',
        		'display_name' => 'Git',
        		'type' => 'Must-have Skill'
        	],
        	[
        		'name' =>'npm',
        		'display_name' => 'npm',
        		'type' => 'Must-have Skill'
        	],
        	[
        		'name' =>'composer',
        		'display_name' => 'Composer',
        		'type' => 'Must-have Skill'
        	],
        ];

        foreach($skills as $skill){
        	DB::table('skill')->insert($skill);
        }
    }
}
