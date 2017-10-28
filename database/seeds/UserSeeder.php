<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roleMember = App\Role::where('name', '=', 'member')->first();
        factory(App\User::class, 10)->create()->each(function($u) use ($roleMember) {
                $u->attachRole($roleMember);
         });
    }
}
