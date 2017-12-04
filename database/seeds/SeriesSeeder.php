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
            ],
            [
                'id' => '10',
                'title' => 'Learn Git',
                'price' => '0',
                'skills' => ['git']
            ],
            [
                'id' => '11',
                'title' => 'Introduction to Java',
                'price' => '5',
                'skills' => ['java']
            ],
            [
                'id' => '12',
                'title' => 'ReactJS: Part 1',
                'price' => '8',
                'skills' => ['reactjs']
            ],
            [
                'id' => '13',
                'title' => 'ReactJS: Part 2',
                'price' => '5',
                'skills' => ['reactjs']
            ],
            [
                'id' => '14',
                'title' => 'Laravel',
                'price' => '20',
                'skills' => ['laravel']
            ],
            [
                'id' => '15',
                'title' => 'The Unreal Engine Developer Course - Learn C++ & Make Games',
                'price' => '10',
                'skills' => ['cpp']
            ],
            [
                'id' => '16',
                'title' => 'Unit Testing in Java',
                'price' => '10',
                'skills' => ['java']
            ],
            [
                'id' => '17',
                'title' => 'Build a JavaFX Application',
                'price' => '10',
                'skills' => ['java']
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
            ],
            [
                'title' => 'Basic Git Workflow',
                'slug' => 'basic-git-workflow',
                'series' => '10'
            ],
            [
                'title' => 'How to Backtrack in Git',
                'slug' => 'how-to-backtrack-in-git',
                'series' => '10'
            ],
            [
                'title' => 'Git Branching',
                'slug' => 'git-branching',
                'series' => '10'
            ],
            [
                'title' => 'Git Teamwork',
                'slug' => 'git-teamwork',
                'series' => '10'
            ],
            [
                'title' => 'Introduction to Java',
                'slug' => 'introduction-to-java',
                'series' => '11'
            ],
            [
                'title' => 'Conditionals and Control Flow',
                'slug' => 'conditionals-and-control-flow',
                'series' => '11'
            ],
            [
                'title' => 'Object-Oriented Java',
                'slug' => 'object-oriented-java',
                'series' => '11'
            ],
            [
                'title' => 'Data Structures',
                'slug' => 'data-structures',
                'series' => '11'
            ],
            [
                'title' => 'Intro to JSX',
                'slug' => 'intro-to-jsx',
                'series' => '12'
            ],
            [
                'title' => 'Advanced JSX',
                'slug' => 'advanced-jsx',
                'series' => '12'
            ],
            [
                'title' => 'React Components',
                'slug' => 'react-components',
                'series' => '12'
            ],
            [
                'title' => 'Components and Advanced JSX',
                'slug' => 'components-and-advanced-jsx',
                'series' => '12'
            ],
            [
                'title' => 'Components Render Other Components',
                'slug' => 'components-render-other-components',
                'series' => '12'
            ],
            [
                'title' => 'Components Interaction',
                'slug' => 'components-interaction',
                'series' => '12'
            ],
            [
                'title' => 'Stateless Components From Stateful Components',
                'slug' => 'stateless-components-from-stateful-components',
                'series' => '13'
            ],
            [
                'title' => 'Child Components Update Their Parents state',
                'slug' => 'child-components-update-their-parents-state',
                'series' => '13'
            ],
            [
                'title' => 'Child Components Update Their Siblings props',
                'slug' => 'child-components-update-their-siblings-props',
                'series' => '13'
            ],
            [
                'title' => 'Style',
                'slug' => 'style',
                'series' => '13'
            ],
            [
                'title' => 'Container Components From Presentational Components',
                'slug' => 'container-components-from-presentational-components',
                'series' => '13'
            ],
            [
                'title' => 'Stateless Functional Components',
                'slug' => 'stateless-functional-components',
                'series' => '13'
            ],
            [
                'title' => 'PropTypes',
                'slug' => 'prop-types',
                'series' => '13'
            ],
            [
                'title' => 'React Forms',
                'slug' => 'react-forms',
                'series' => '13'
            ],
            [
                'title' => 'Mounting Lifecycle Methods',
                'slug' => 'mounting-lifecycle-methods',
                'series' => '13'
            ],
            [
                'title' => 'Updating and Unmounting Lifecycle Methods',
                'slug' => 'updating-and-unmounting-lifecycle-methods',
                'series' => '13'
            ],
            [
                'title' => 'Configuration',
                'slug' => 'configuration',
                'series' => '14'
            ],
            [
                'title' => 'Routing',
                'slug' => 'routing',
                'series' => '14'
            ],
            [
                'title' => 'Middleware',
                'slug' => 'middleware',
                'series' => '14'
            ],
            [
                'title' => 'Controllers',
                'slug' => 'controllers',
                'series' => '14'
            ],
            [
                'title' => 'Request',
                'slug' => 'request',
                'series' => '14'
            ],
            [
                'title' => 'Cookie',
                'slug' => 'cookie',
                'series' => '14'
            ],
            [
                'title' => 'Response',
                'slug' => 'response',
                'series' => '14'
            ],
            [
                'title' => 'Views',
                'slug' => 'views',
                'series' => '14'
            ],
            [
                'title' => 'Redirections',
                'slug' => 'redirections',
                'series' => '14'
            ],
            [
                'title' => 'Working with Database',
                'slug' => 'working-with-database',
                'series' => '14'
            ],
            [
                'title' => 'Errors and Logging',
                'slug' => 'errors-and-logging',
                'series' => '14'
            ],
            [
                'title' => 'Forms',
                'slug' => 'forms',
                'series' => '14'
            ],
            [
                'title' => 'Localization',
                'slug' => 'localization',
                'series' => '14'
            ],
            [
                'title' => 'Session',
                'slug' => 'session',
                'series' => '14'
            ],
            [
                'title' => 'Validation',
                'slug' => 'validation',
                'series' => '14'
            ],
            [
                'title' => 'File Uploading',
                'slug' => 'file-uploading',
                'series' => '14'
            ],
            [
                'title' => 'Sending Email',
                'slug' => 'sending-email',
                'series' => '14'
            ],
            [
                'title' => 'AJAX',
                'slug' => 'ajax',
                'series' => '14'
            ],
            [
                'title' => 'Error Handling',
                'slug' => 'error-handling',
                'series' => '14'
            ],
            [
                'title' => 'Event Handling',
                'slug' => 'event-handling',
                'series' => '14'
            ],
            [
                'title' => 'Facades',
                'slug' => 'facades',
                'series' => '14'
            ],
            [
                'title' => 'Security',
                'slug' => 'security',
                'series' => '14'
            ],
            [
                'title' => 'Unreal Development Environment',
                'slug' => 'unreal-development-environment',
                'series' => '15'
            ],
            [
                'title' => 'A Quick Tour of Unreal Editor',
                'slug' => 'a-quick-tour-of-unreal-editor',
                'series' => '15'
            ],
            [
                'title' => 'Introducing Classes',
                'slug' => 'introducing-classes',
                'series' => '15'
            ],
            [
                'title' => 'Getting to Know Unreal Editor',
                'slug' => 'getting-to-know-unreal-editor',
                'series' => '15'
            ],
            [
                'title' => 'Testing Grounds Introduction',
                'slug' => 'testing-grounds-introduction',
                'series' => '15'
            ],
            [
                'title' => 'Introduction to Unit Testing',
                'slug' => 'introduction-to-unit-testing',
                'series' => '16'
            ],
            [
                'title' => 'Defining a Unit',
                'slug' => 'defining-a-unit',
                'series' => '16'
            ],
            [
                'title' => 'How We Define Units',
                'slug' => 'how-we-define-units',
                'series' => '16'
            ],
            [
                'title' => 'Code Reuse',
                'slug' => 'code-reuse',
                'series' => '16'
            ],
            [
                'title' => 'Composition vs. Inheritance',
                'slug' => 'composition-vs-inheritance',
                'series' => '16'
            ],
            [
                'title' => 'Single Responsibility Principle',
                'slug' => 'single-responsibility-principle',
                'series' => '16'
            ],
            [
                'title' => 'Introduction to JavaFX',
                'slug' => 'introduction-to-javafx',
                'series' => '17'
            ],
            [
                'title' => 'GUI History',
                'slug' => 'gui-history',
                'series' => '17'
            ],
            [
                'title' => 'Meet JavaFX',
                'slug' => 'meet-javafx',
                'series' => '17'
            ],
            [
                'title' => 'Node Types',
                'slug' => 'node-types',
                'series' => '17'
            ],
            [
                'title' => 'Adding Interactivity',
                'slug' => 'adding-interactivity',
                'series' => '17'
            ],
            [
                'title' => 'Adding an Event Handler',
                'slug' => 'adding-an-event-handler',
                'series' => '17'
            ]
        ];
        
        foreach ($tutorials as $tut) {
            $tutorials_id = DB::table('tutorial')->insertGetId(
                ['title' => $tut['title'], 'slug' => $tut['slug'], 'body' => 'XXX', 'series_id' => $tut['series']]);
        }
    }
}