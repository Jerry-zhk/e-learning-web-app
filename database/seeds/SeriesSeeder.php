<?php

use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = [
        	[
        		'title' => 'PHP for beginning',
        		'price' => '8',
        		'skills' => ['php']
        	],
        	[
        		'title' => 'MySQL Basics',
        		'price' => '8',
        		'skills' => ['mysql']
        	],
        	[
        		'title' => 'PHP PDO Tutorials',
        		'price' => '5',
        		'skills' => ['php', 'mysql']
        	],
        ];

        foreach ($series as $s) {
        	$series_id = DB::table('series')->insertGetId(
        		['title' => $s['title'], 'price' => $s['price']]
        	);
        	foreach ($s['skills'] as $skill_name) {
        		$skill_id = DB::table('skill')->where('name', $skill_name)->first()->id;
        		DB::table('skill_series')->insert(
	        		['skill_id' => $skill_id, 'series_id' => $series_id]
	        	);
        	}
        }

    }
}
