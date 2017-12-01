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
    	$roleMember = App\Role::where('name', '=', 'member')->first();
        factory(App\User::class, 10)->create()->each(function($u) use ($roleMember) {
                //$u->attachRole($roleMember);
         });
        
        $superadmin = User::find(1);
        $superadmin->active = 1;
        $superadmin->save();
        $superadmin->syncRoles([1]);
        
        $admin = User::find(2);
        $admin->active = 1;
        $admin->save();
        $admin->syncRoles([2]);
        
        $member = User::find(3);
        $member->active = 1;
        $member->save();
        $member->syncRoles([3]);
        
        $tutor = User::find(4);
        $tutor->active = 1;
        $tutor->save();
        $tutor->syncRoles([4]);
        
    }
}
