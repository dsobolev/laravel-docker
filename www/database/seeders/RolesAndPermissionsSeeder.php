<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolesIds = $this->createRolesAndGetIds();

        $this->assignCreatePostsPerm($rolesIds);
        $this->assignEditPostsPerm($rolesIds);
        $this->assignDeletePostsPerm($rolesIds);
        $this->assignManageUsersPerms($rolesIds);
    }

    private function createRolesAndGetIds() : \stdClass
    {

        $rolesIds = new \stdClass;

        $rolesIds->admin = DB::table('roles')->insertGetId([
            'name' => 'admin',
            'label' => 'Administrator'
        ]);

        $rolesIds->editor = DB::table('roles')->insertGetId([
            'name' => 'editor',
            'label' => 'Editor'
        ]);

        $rolesIds->author = DB::table('roles')->insertGetId([
            'name' => 'author',
            'label' => 'Author'
        ]);

        return $rolesIds;
    }

    private function assignCreatePostsPerm(\stdClass $rolesIds)
    {
        $permissions = [ $this->createPermission('create_posts', 'Create Posts') ];

        $this->assignPermissionsTo($permissions, [
            $rolesIds->admin,
            $rolesIds->editor,
            $rolesIds->author
        ]);
    }

    private function assignEditPostsPerm(\stdClass $rolesIds)
    {
        $permissions = [ $this->createPermission('edit_posts', 'Edit Posts') ];

        $this->assignPermissionsTo($permissions, [
            $rolesIds->admin,
            $rolesIds->editor
        ]);
    }

    private function assignDeletePostsPerm(\stdClass $rolesIds)
    {
        $permissions = [ $this->createPermission('delete_posts', 'Delete Posts') ];

        $this->assignPermissionsTo($permissions, [
            $rolesIds->admin,
            $rolesIds->editor
        ]);
    }

    private function assignManageUsersPerms(\stdClass $rolesIds)
    {
        $roles = [ $rolesIds->admin ];

        $permissions = [];
        $permissions []= $this->createPermission('list_users', 'See Users');
        $permissions []= $this->createPermission('edit_users', 'Change Roles');
        $permissions []= $this->createPermission('delete_users', 'Remove Users');

        $this->assignPermissionsTo($permissions, $roles);
    }

    private function createPermission(string $permName, string $permLabel) : int
    {
        return DB::table('permissions')->insertGetId([
            'name' => $permName,
            'label' => $permLabel
        ]);
    }

    private function assignPermissionsTo(array $permissions, array $roles)
    {
        $assignments = [];
        foreach ($permissions as $permission) {
            foreach ($roles as $role) {
                $assignments []= [
                    'role_id' => $role,
                    'permission_id' => $permission
                ];
            }
        }

        DB::table('permission_role')->insert($assignments);
    }
}
