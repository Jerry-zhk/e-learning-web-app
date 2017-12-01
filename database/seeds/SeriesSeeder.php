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
                'id' => '1',
        		'title' => 'PHP for beginner',
        		'price' => '8',
        		'skills' => ['php']
        	],
        	[
                'id' => '2',
        		'title' => 'MySQL Basics',
        		'price' => '8',
        		'skills' => ['mysql']
        	],
        	[
                'id' => '3',
        		'title' => 'PHP PDO Tutorials',
        		'price' => '5',
        		'skills' => ['php', 'mysql']
        	],
            [
                'id' => '4',
                'title' => 'Introductory JavaScript',
                'price' => '0',
                'skills' => ['javascript']
            ],
            [
                'id' => '5',
                'title' => 'Python - The New Era',
                'price' => '6',
                'skills' => ['python']
            ],
            [
                'id' => '6',
                'title' => 'The Artistic CSS',
                'price' => '7',
                'skills' => ['css']
            ],
            [
                'id' => '7',
                'title' => 'Getting to know C Programming',
                'price' => '6',
                'skills' => ['c']
            ],
            [
                'id' => '8',
                'title' => 'Mastering JavaScript',
                'price' => '10',
                'skills' => ['javascript']
            ],
            [
                'id' => '9',
                'title' => 'Knowing AngularJS',
                'price' => '5',
                'skills' => ['angularjs']
            ]
        ];

        foreach ($series as $s) {
        	$series_id = DB::table('series')->insertGetId(
        		['id' => $s['id'], 'title' => $s['title'], 'price' => $s['price']]
        	);
        	foreach ($s['skills'] as $skill_name) {
        		$skill_id = DB::table('skill')->where('name', $skill_name)->first()->id;
        		DB::table('skill_series')->insert(
	        		['skill_id' => $skill_id, 'series_id' => $series_id]
	        	);
        	}
        }
        
        $tutorials = [
            [
                'title' => 'What is PHP',
                'slug' => 'what-is-php',
                'series' => '1'
            ],
            [
                'title' => 'How does PHP work',
                'slug' => 'how-does-php-work',
                'series' => '1'
            ],
            [
                'title' => 'The Basic Usage',
                'slug' => 'the-basic-usage',
                'series' => '1'
            ],
            [
                'title' => 'Connecting to Database',
                'slug' => 'connect-to-database',
                'series' => '1'
            ],
            [
                'title' => 'SQL Connection',
                'slug' => 'sql-connection',
                'series' => '2'
            ],
            [
                'title' => 'SQL Authorization',
                'slug' => 'sql-connection',
                'series' => '2'
            ],
            [
                'title' => 'Retrieving Data from Database',
                'slug' => 'retrieving-data-from-databse',
                'series' => '2'
            ],
            [
                'title' => 'Basic SQL Statement',
                'slug' => 'basic-sql-statement',
                'series' => '2'
            ],
            [
                'title' => 'Advanced SQL Statement',
                'slug' => 'Advanced-sql-statement',
                'series' => '2'
            ],
            [
                'title' => 'Introducing PDO',
                'slug' => 'introducing-pdo',
                'series' => '3'
            ],
            [
                'title' => 'Learning PDO Statement 1',
                'slug' => 'learning-pdo-statement-1',
                'series' => '3'
            ],
            [
                'title' => 'Learning PDO Statement 2',
                'slug' => 'learning-pdo-statement-2',
                'series' => '3'
            ],
            [
                'title' => 'Knowing JS',
                'slug' => 'knowing-js',
                'series' => '4'
            ],
            [
                'title' => 'Java VS JavaScript',
                'slug' => 'java-vs-javascript',
                'series' => '4'
            ],
            [
                'title' => 'Get It Work',
                'slug' => 'get-it-work',
                'series' => '5'
            ],
            [
                'title' => 'Pros and Cons of Python',
                'slug' => 'pros-and-cons-of-python',
                'series' => '5'
            ],
            [
                'title' => 'The Decorator',
                'slug' => 'the-decorator',
                'series' => '6'
            ],
            [
                'title' => 'Applying CSS',
                'slug' => 'applying-css',
                'series' => '6'
            ],
            [
                'title' => 'History of C',
                'slug' => 'history-of-c',
                'series' => '7'
            ],
            [
                'title' => 'Procedural Orienting',
                'slug' => 'procedural-orienting',
                'series' => '7'
            ],
            [
                'title' => 'Big Step to JS',
                'slug' => 'big-step-to-js',
                'series' => '8'
            ],
            [
                'title' => 'Advanced Functions 1',
                'slug' => 'advanced-functions-1',
                'series' => '8'
            ],
            [
                'title' => 'Advanced Functions 2',
                'slug' => 'advanced-functions-2',
                'series' => '8'
            ],
            [
                'title' => 'What is AngularJS',
                'slug' => 'what-is-angularjs',
                'series' => '9'
            ]
        ];
        
        foreach ($tutorials as $tut) {
            $tutorials_id = DB::table('tutorial')->insertGetId(
                ['title' => $tut['title'], 'slug' => $tut['slug'], 'body' => 'XXX', 'series_id' => $tut['series']]);
        }

    }
}
