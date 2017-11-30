<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$perms = [
            //User
    		[
    			'name' => 'user-create',
    			'display_name' => 'User Create',
    			'description' => 'Ability to create user accounts'
    		],
    		[
    			'name' => 'user-ban',
    			'display_name' => 'User Ban',
    			'description' => 'Ability to ban user accounts'
    		],
    		[
    			'name' => 'user-delete',
    			'display_name' => 'User Delete',
    			'description' => 'Ability to delete user accounts'
    		],
            //User roles
    		[
    			'name' => 'user-role-update',
    			'display_name' => 'User Role Update',
    			'description' => 'Ability to update an user\'s role'
    		],
    		[
    			'name' => 'role-create',
    			'display_name' => 'Role Create',
    			'description' => 'Ability to create roles'
    		],
    		[
    			'name' => 'role-update',
    			'display_name' => 'Role Update',
    			'description' => 'Ability to update roles'
    		],
    		[
    			'name' => 'role-delete',
    			'display_name' => 'Role Delete',
    			'description' => 'Ability to delete roles'
    		],
            //User permission
    		[
    			'name' => 'role-perm-update',
    			'display_name' => 'Role Permission Update',
    			'description' => 'Ability to update a role\'s permissions'
    		],
    		[
    			'name' => 'perm-create',
    			'display_name' => 'Permission Create',
    			'description' => 'Ability to create permissions'
    		],
    		[
    			'name' => 'perm-update',
    			'display_name' => 'Permission Update',
    			'description' => 'Ability to update permissions'
    		],
    		[
    			'name' => 'perm-delete',
    			'display_name' => 'Permission Delete',
    			'description' => 'Ability to delete permissions'
    		],
            //Series and tutorials
    		[
    			'name' => 'series&tutorial-create',
    			'display_name' => 'Series & Tutorial Create',
    			'description' => 'Ability to create series and tutorials'
    		],
    		[
    			'name' => 'series&tutorial-update',
    			'display_name' => 'Series & Tutorial Update',
    			'description' => 'Ability to update series and tutorials'
    		],
    		[
    			'name' => 'series&tutorial-delete',
    			'display_name' => 'Series & Tutorial Delete',
    			'description' => 'Ability to delete series and tutorials'
    		],
            //Transactions
    		[
    			'name' => 'any-transaction-read',
    			'display_name' => 'Transaction Read',
    			'description' => 'Ability to read transactions of tutorial purchase of any user'
    		],
    		[
    			'name' => 'self-transaction-read',
    			'display_name' => 'Any Transaction Read',
    			'description' => 'Ability to read transactions of tutorial purchase of current user'
    		],
            //User activities
    		[
    			'name' => 'any-user-activity-read',
    			'display_name' => 'User Activity Read',
    			'description' => 'Ability to read activities of any user'
    		],
    		[
    			'name' => 'self-user-activity-read',
    			'display_name' => 'Any User Activity Read',
    			'description' => 'Ability to read activities of current user'
    		],
            //Deletion restore
    		[
    			'name' => 'deletion-restore',
    			'display_name' => 'Deletion Restore',
    			'description' => 'Ability to restore a deletion operation'
    		],
            //User profile
            [
    			'name' => 'profile-update',
    			'display_name' => 'Profile Update',
    			'description' => 'Ability to modify profile of current user'
    		]
    	];

    	$permissions = array();

    	foreach ($perms as $perm) {
    		array_push($permissions, Permission::create($perm));
    	}
        
        //Super admin
    	$superadmin = Role::create([
    		'name' => 'superadmin',
    		'display_name' => 'Super Admin',
    		'description' => 'User who can access all functionalities in the system.'
    	]);

    	$superadmin->attachPermissions($permissions);

        //Admin
    	$admin = Role::create([
    		'name' => 'admin',
    		'display_name' => 'Admin',
    		'description' => 'User who can manage resources of the system.'
    	]);

    	$admin->attachPermissions([
    		'series&tutorial-create',
    		'series&tutorial-update',
    		'series&tutorial-delete',
    		'any-transaction-read',
    		'self-transaction-read',
    		'any-user-activity-read',
    		'self-user-activity-read',
    	]);

        //Member
    	$member = Role::create([
    		'name' => 'member',
    		'display_name' => 'Member',
    		'description' => 'User who can access basic functionalities in the system.'
    	]);

		$member->attachPermissions([
    		'self-transaction-read',
    		'self-user-activity-read',
    	]);
        
        //Tutor
        $tutor = Role::create([
    		'name' => 'tutor',
    		'display_name' => 'Tutor',
    		'description' => 'User who can manage teaching materials.'
    	]);

		$tutor->attachPermissions([
            'series&tutorial-create',
            'series&tutorial-update',
            'series&tutorial-delete'
    	]);
        
        
        
    }
}
