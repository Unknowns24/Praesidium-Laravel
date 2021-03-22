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
            DB::table(config('praesidium.tables.roles'))->truncate();
            DB::table(config('praesidium.tables.role_user'))->truncate();
            DB::table(config('praesidium.tables.permission_role'))->truncate();
            DB::table(config('praesidium.tables.permission_user'))->truncate();
            DB::table(config('praesidium.tables.permissions'))->truncate();
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
            'description' => 'Root role auto-created',
            'full-access' => 'yes'
        ]);

        Role::create([
            'name' => 'User',
            'slug' => 'user',
            'description' => 'User role auto-created',
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
    }
}
