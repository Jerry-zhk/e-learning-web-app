<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create()->each(function($u){
                $u->active = 1;
                $u->username = 'superadmin';
                $u->name = 'Super Admin';
                $u->save();
                $u->syncRoles([1]);
         });
        
        factory(App\User::class, 1)->create()->each(function($u){
                $u->active = 1;
                $u->username = 'admin';
                $u->name = 'Admin';
                $u->save();
                $u->syncRoles([2]);
         });

        factory(App\User::class, 1)->create()->each(function($u){
                $u->active = 1;
                $u->username = 'tutor';
                $u->name = 'Tutor';
                $u->save();
                $u->syncRoles([3]);
         });

        factory(App\User::class, 1)->create()->each(function($u){
                $u->active = 1;
                $u->username = 'member';
                $u->name = 'Member';
                $u->save();
                $u->syncRoles([4]);
         });
        factory(App\User::class, 6)->create()->each(function($u){
                $u->syncRoles([4]);
         });
        
        
    }
}
