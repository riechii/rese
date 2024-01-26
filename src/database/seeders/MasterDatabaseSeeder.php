<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Carbon\Carbon;

class MasterDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $admin = User::create([
            'name' => '管理者',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => $now,
        ]);

        $manager = User::create([
            'name' => '店舗代表者',
            'email' => 'manager@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => $now,
        ]);

        User::create([
            'name' => 'ユーザー１',
            'email' => 'tt@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => $now,
        ]);

        User::create([
            'name' => 'ユーザー２',
            'email' => 'ss@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => $now,
        ]);

        User::create([
            'name' => 'ユーザー3',
            'email' => 'ee@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => $now,
        ]);

        //ロール作成
        $adminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);

        //権限の作成
        $creationPermission = Permission::create(['name' => 'creation']);
        $registerPermission = Permission::create(['name' => 'register']);

        //役割に権限を付与
        $adminRole->givePermissionTo([$creationPermission, $registerPermission]);
        $managerRole->givePermissionTo($registerPermission);

        //権限の割り当て
        $admin->assignRole($adminRole);
        $manager->assignRole($managerRole);
    }
}
