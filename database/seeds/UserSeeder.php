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
                $u->attachRole($roleMember);
         });
        
        $superadmin = User::find(1);
        $superadmin->active = 1;
        $superadmin->username = 'superadmin';
        $superadmin->name = 'Super Admin';
        $superadmin->save();
        $superadmin->syncRoles([1]);
        
        $admin = User::find(2);
        $admin->active = 1;
        $admin->username = 'admin';
        $admin->name = 'Admin';
        $admin->save();
        $admin->syncRoles([2]);
        

        $tutor = User::find(3);
        $tutor->active = 1;
        $tutor->username = 'tutor';
        $tutor->name = 'Tutor';
        $tutor->save();
        $tutor->syncRoles([3]);

        $member = User::find(4);
        $member->active = 1;
        $member->username = 'member';
        $member->name = 'Member';
        $member->save();

        $member->syncRoles([4]);
        
        
    }
}
