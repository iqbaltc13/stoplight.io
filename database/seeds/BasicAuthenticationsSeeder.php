<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Models\Role;
use App\Models\Permission;



class BasicAuthenticationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->command->info('disabling foreignkeys check');
        Schema::disableForeignKeyConstraints();
        $this->command->info('truncating permission_role...');
        DB::table('permission_role')->truncate();
        $this->command->info('truncating permission_user...');
        DB::table('permission_user')->truncate();
        $this->command->info('truncating user...');
        DB::table('users')->truncate();
        $this->command->info('truncating roles...');
        DB::table('roles')->truncate();
        $this->command->info('truncating permissions...');
        DB::table('permissions')->truncate();
        $this->command->info('truncating role_user...');
        DB::table('role_user')->truncate();
        $this->command->info('enabling foreignkeys check');
        Schema::enableForeignKeyConstraints();
        $builtInPermissions = [
            ['name' => 'kelolapengguna'],
            ['name' => 'kelolapengguna-pengguna'],
            ['name' => 'kelolapengguna-peran'],
            ['name' => 'kelolapengguna-hakakses'],
            //['name' => 'kelola-pendaftar-kbih']
        ];
        $builtInRolesAndUsers = [
            'super-admin' => [
                'name' => 'super-admin',
                //'built_in' => 1,
                'permissions' => [
                    'kelolapengguna',
                    'kelolapengguna-pengguna',
                    'kelolapengguna-peran',
                    'kelolapengguna-hakakses',
                ],
                'user' => [
                    [
                        'name' => 'Super Admin',
                        'email' => 'super.admin@virthost.id',
                        'phone' => '001',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 1,
                    ],
                ],
            ],
            'admin' => [
                'name' => 'admin-all',
                //'built_in' => 0,
                'permissions' => [
                    
                ],
                'user' => [
                    [
                        'name' => 'Admin Virtual Hospital',
                        'email' => 'admin@virthost.id',
                        'phone' => '08123456',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                ],
            ],
            
            'nasabah' => [
                'name' => 'nasabah',
                //'built_in' => 0,
                'permissions' => [
                    //'kelola-pendaftar-kbih',
                ],
                'user' => [
                     [
                        'name' => 'nasabah 1',
                        'email' => 'nasabah1@stoplght.io',
                        'phone' => '0801',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 2',
                        'email' => 'nasabah2@stoplght.io',
                        'phone' => '0802',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 3',
                        'email' => 'nasabah3@stoplght.io',
                        'phone' => '0803',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 4',
                        'email' => 'nasabah4@stoplght.io',
                        'phone' => '0804',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 5',
                        'email' => 'nasabah5@stoplght.io',
                        'phone' => '0805',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 6',
                        'email' => 'nasabah6@stoplght.io',
                        'phone' => '0802',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 7',
                        'email' => 'nasabah7@stoplght.io',
                        'phone' => '0807',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 8',
                        'email' => 'nasabah8@stoplght.io',
                        'phone' => '0808',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 9',
                        'email' => 'nasabah9@stoplght.io',
                        'phone' => '0809',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 10',
                        'email' => 'nasabah10@stoplght.io',
                        'phone' => '0810',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                     [
                        'name' => 'nasabah 11',
                        'email' => 'nasabah11@stoplght.io',
                        'phone' => '0811',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 12',
                        'email' => 'nasabah12@stoplght.io',
                        'phone' => '0812',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 13',
                        'email' => 'nasabah13@stoplght.io',
                        'phone' => '0813',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 14',
                        'email' => 'nasabah14@stoplght.io',
                        'phone' => '0814',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 15',
                        'email' => 'nasabah15@stoplght.io',
                        'phone' => '0815',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 16',
                        'email' => 'nasabah16@stoplght.io',
                        'phone' => '0816',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 17',
                        'email' => 'nasabah17@stoplght.io',
                        'phone' => '0817',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 18',
                        'email' => 'nasabah18@stoplght.io',
                        'phone' => '0818',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 19',
                        'email' => 'nasabah19@stoplght.io',
                        'phone' => '0819',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                    [
                        'name' => 'nasabah 20',
                        'email' => 'nasabah20@stoplght.io',
                        'phone' => '0820',
                        'password' => 'bismillah',
                        'is_active' => 1,
                        'built_in' => 0,
                    ],
                ],
            ],
            
        ];

        foreach ($builtInPermissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission['name'],
                'display_name' => ucwords(str_replace('-', ' ', $permission['name'])),
                'description' => ucwords(str_replace('-', ' ', $permission['name'])),
                //'built_in' => 1,
            ]);
            $this->command->info('Creating Permission: '. ucwords(str_replace('-', ' ', $permission['name'])));
        }
        foreach ($builtInRolesAndUsers as $key => $role) {
            $persistedRole = Role::create([
                'name' => $role['name'],
                'display_name' => ucwords(str_replace('-', ' ', $role['name'])),
                'description' => ucwords(str_replace('-', ' ', $role['name'])),
                //'built_in' => $role['built_in'],
            ]);
            $this->command->info('Creating Role: '. ucwords(str_replace('-', ' ', $key)).' with '.@count($role['permissions']).' permissions.');

            $permissions = [];
            foreach ($role['permissions'] as $permissionName) {
                $permissions[] = Permission::where('name', $permissionName)->first();   
            }
            $persistedRole->attachPermissions($permissions);

            foreach ($role['user'] as $user) {
                $persistedUser = factory(User::class)->create($user);
                $this->command->info('Creating User: '. $user['name'].' ('.$user['email'].')');
                $persistedUser->attachRole($persistedRole);
                $this->command->info('Attach Role '. $persistedRole['display_name'] .' to User '. $user['name']);
            }
        }

    }
}
