<?php

namespace UNK\Praesidium\Database\Seeders;

// User is needed for create new users
use App\Models\User;

// Illuminate needs  
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// This Package needs
use UNK\Praesidium\Models\Role;
use UNK\Praesidium\Models\Permission;

class PraesidiumSeeder extends Seeder
{
    public function run()
    {

        /////////////////////
        // Truncate Tables //
        /////////////////////
        DB::statement("SET foreign_key_checks=0");
            DB::table('roles')->truncate();
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            DB::table('permissions')->truncate();
        DB::statement("SET foreign_key_checks=1");


        ///////////////////
        // User Creation //
        ///////////////////

        $usernameField = config('praesidium.others-tables.Models.user.username');
        $PasswordField = config('praesidium.others-tables.Models.user.password');
        $emailField = config('praesidium.others-tables.Models.user.email');

        $rootuserComprobationOne = User::where("$emailField", 'unknowns0074@gmail.com')->first();
        
        if($rootuserComprobationOne)
        {
            $rootuserComprobationOne->delete();
        }
        
        $rootuserComprobationTwo = User::where("$usernameField", 'root')->first();

        if($rootuserComprobationTwo)
        {
            $rootuserComprobationTwo->delete();
        }

        $rootUser = User::create([
            "$usernameField" => 'Unknowns',
            "$PasswordField" => '$2y$10$P8OMaIpnY0nBbFzYGPZY1.UHTPACpr5tBMrY3ITHi.U.dPqC7sOES',
            "$emailField" => 'Unknowns0074@gmail.com'
        ]);

        ////////////////////
        // Roles creation //
        ////////////////////

        $rootRole = Role::create([
            'name' => 'Root',
            'slug' => 'root',
            'description' => 'Root permission auto-created',
            'full-access' => 'yes'
        ]);

        Role::create([
            'name' => 'Guest',
            'slug' => 'guest',
            'description' => 'Give the access to the panel',
            'full-access' => 'no'
        ]);

        ///////////////////////////////////////
        // Give to root User the permissions //
        ///////////////////////////////////////

        $rootUser->roles()->sync($rootRole->id);

        /////////////////
        // Permissions //
        /////////////////
        
        ///* GENERAL PERMISSIONS */// 

        Permission::create([
            'name' => 'Panel Access',
            'slug' => 'panel.index',
            'description' => 'Give the access to the panel'
        ]);

        Permission::create([
            'name' => 'See Roles',
            'slug' => 'roles.index',
            'description' => 'Give the access to see the roles in the server'
        ]);

        Permission::create([
            'name' => 'Create roles',
            'slug' => 'roles.create',
            'description' => 'Give the access to create roles'
        ]);

        Permission::create([
            'name' => 'Edit roles',
            'slug' => 'roles.edit',
            'description' => 'Give the access to Edit roles'
        ]);

        Permission::create([
            'name' => 'Delete roles',
            'slug' => 'roles.destroy',
            'description' => 'Give the access to delete roles'
        ]);

        /* APPS PERMISSIONS */

        Permission::create([
            'name' => 'See Apps',
            'slug' => 'apps.index',
            'description' => 'Give the access to see the applications created'
        ]);

        Permission::create([
            'name' => 'Create Apps',
            'slug' => 'apps.create',
            'description' => 'Give the access to create apps'
        ]);

        Permission::create([
            'name' => 'Edit Apps',
            'slug' => 'apps.edit',
            'description' => 'Give the access to edit the apps'

        ]);

        Permission::create([
            'name' => 'Delete Apps',
            'slug' => 'apps.destroy',
            'description' => 'Give the access to delete apps'
        ]);
        
        /* LICENSES PERMISSIONS */

        Permission::create([
            'name' => 'See licenses',
            'slug' => 'licenses.index',
            'description' => 'Give the access see the licenses created'
            ]);
            
        Permission::create([
            'name' => 'Create licenses',
            'slug' => 'licenses.create',
            'description' => 'Give the access to create new licenses'
        ]);


        Permission::create([
            'name' => 'Edit licenses',
            'slug' => 'licenses.edit',
            'description' => 'Give the access to the panel'
        ]);

        Permission::create([
            'name' => 'Switch Licenses',
            'slug' => 'licenses.switch',
            'description' => 'Give the access to enable/disable licenses'
        ]);

        Permission::create([
            'name' => 'Delete Liceses',
            'slug' => 'licenses.destroy',
            'description' => 'Give the access to delete licenses'
        ]);

        /* REPORTS PERMISSIONS */

        Permission::create([
            'name' => 'List reports',
            'slug' => 'reports.index',
            'description' => 'Give the access to list the reports'

        ]);

        Permission::create([
            'name' => 'Mark reports',
            'slug' => 'reports.switch',
            'description' => 'Give the access to mark reports how saw it'
        ]);

        Permission::create([
            'name' => 'Answer reports',
            'slug' => 'reports.answer',
            'description' => 'Give the access to answer the reports'

        ]);

        /* USERS PERMISSIONS */

        Permission::create([
            'name' => 'List users',
            'slug' => 'users.index',
            'description' => 'Give the access to list users'
        ]);


        Permission::create([
            'name' => 'Create users',
            'slug' => 'users.create',
            'description' => 'Give the access to create users'
        ]);

        Permission::create([
            'name' => 'Edit users',
            'slug' => 'users.edit',
            'description' => 'Give the access to edit users'
        ]);

        Permission::create([
            'name' => 'Ban Users',
            'slug' => 'users.ban',
            'description' => 'Give the access to ban users'
        ]);

        Permission::create([
            'name' => 'Delete Users',
            'slug' => 'users.destroy',
            'description' => 'Give the access to delete users'

        ]);
    }
}
