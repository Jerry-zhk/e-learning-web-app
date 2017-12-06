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
            [
                'name' => 'access-admin-page',
                'display_name' => 'Access Admin Page',
                'description' => 'Ability to access admin page'
            ],
            //User roles
    		[
    			'name' => 'user-role-perm-update',
    			'display_name' => 'User Role/Perm Update',
    			'description' => 'Ability to update an user\'s role or permission'
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
                'name' => 'series&tutorial-free-access',
                'display_name' => 'Series & Tutorial Free Access',
                'description' => 'Ability to access series and tutorials for free'
            ],
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
    			'name' => 'user-transaction-read',
    			'display_name' => 'Transaction Read',
    			'description' => 'Ability to read transactions of tutorial purchase of any user'
    		],
            //User activities
    		[
    			'name' => 'user-activity-read',
    			'display_name' => 'User Activity Read',
    			'description' => 'Ability to read activities of any user'
    		],
            //Deletion restore
    		[
    			'name' => 'deletion-restore',
    			'display_name' => 'Deletion Restore',
    			'description' => 'Ability to restore a deletion operation'
    		],
            [
                'name' => 'statistics',
                'display_name' => 'Access Stats',
                'description' => 'Ability to access to the site statistics'
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
            'access-admin-page',
            'series&tutorial-free-access',
            'series&tutorial-create',
            'series&tutorial-update',
    		'series&tutorial-delete',
    		'user-transaction-read',
    		'user-activity-read',
            'deletion-restore',
            'statistics'
    	]);
        
        //Tutor
        $tutor = Role::create([
    		'name' => 'tutor',
    		'display_name' => 'Tutor',
    		'description' => 'User who can manage teaching materials.'
    	]);

		$tutor->attachPermissions([
            'access-admin-page',
            'series&tutorial-free-access',
            'series&tutorial-create',
            'series&tutorial-update',
    	]);

        //Member
        $member = Role::create([
            'name' => 'member',
            'display_name' => 'Member',
            'description' => 'User who can access basic functionalities in the system.'
        ]);

        
        
        
    }
}
