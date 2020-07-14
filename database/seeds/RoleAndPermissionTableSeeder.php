<?php

use App\Admin;
use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class RoleAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $this->command->call('migrate:refresh');
        $this->command->warn("Data cleared");

        $input_email = $this->command->ask('Enter email address ?', 'test@test.com');
        $user = Admin::create([
            'email' => trim($input_email),
            'password' => bcrypt('123456')
        ]);
        $this->command->info('User added.');


        $permissions = Permission::defaultPermissions();
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name'=>'admin']);
        }
        $this->command->info('Default Permissions added.');


        if ($this->command->confirm('Create Roles ? [Y|N]cls', true)) {
            $input_roles = $this->command->ask('Enter roles in comma separate format.', 'Admin,User');
            $roles_array = explode(',', $input_roles);
            foreach($roles_array as $ro) {
                $role = Role::create(['name' => ucfirst(trim($ro)), 'guard_name'=>'admin']);

                if( $role->name == 'Admin' ) {
                    $role->syncPermissions(Permission::all());
                } else {
                    $role->syncPermissions(Permission::where('name', 'LIKE', 'list_%')->get());
                }

                $user->assignRole($role->name);
            }
        }else{
            $role = Role::firstOrCreate(['name' => 'Admin']);
            $role->syncPermissions(Permission::all());
            $user->assignRole($role->name);
        }

        $this->userDetails($user);
    }

    private function userDetails($user){
        $this->command->info('Here is your admin details to login:');
        $this->command->warn($user->email);
        $this->command->warn('Password is "123456"');
    }
}
