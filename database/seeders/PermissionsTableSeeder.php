<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'id' => '1',
                'name' => 'user-list',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'admin.users.index',
            ], [
                'id' => '2',
                'name' => 'user-create',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'admin.users.create,admin.users.store',
            ], [
                'id' => '3',
                'name' => 'user-edit',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'admin.users.edit,admin.users.update',
            ], [
                'id' => '4',
                'name' => 'user-delete',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'admin.users.destroy',
            ], [
                'id' => '5',
                'name' => 'user-show',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'admin.users.show',
            ], [
                'id' => '6',
                'name' => 'user-showProfile',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'admin.showProfile',
            ], [
                'id' => '7',
                'name' => 'user-editProfile',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'admin.editProfile',
            ], [
                'id' => '8',
                'name' => 'user-profile',
                'display_name' => 'المستخدمين',
                'guard_name' => 'web',
                'routes' => 'admin.profile',
            ], [
                'id' => '9',
                'name' => 'role-list',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'admin.roles.index',
            ], [
                'id' => '10',
                'name' => 'role-create',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'admin.roles.create,admin.roles.store',
            ], [
                'id' => '11',
                'name' => 'role-edit',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'admin.roles.edit,admin.roles.update',
            ], [
                'id' => '12',
                'name' => 'role-delete',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'admin.roles.destroy',
            ], [
                'id' => '13',
                'name' => 'role-show',
                'display_name' => 'الصلاحيات',
                'guard_name' => 'web',
                'routes' => 'admin.roles.show',
            ], [
                'id' => '14',
                'name' => 'admin-home',
                'display_name' => 'الرئيسيه',
                'guard_name' => 'web',
                'routes' => 'admin.home',
            ], [
                'id' => '15',
                'name' => 'workday-list',
                'display_name' => 'الدول',
                'guard_name' => 'web',
                'routes' => 'admin.workdays.index',
            ], [
                'id' => '16',
                'name' => 'workday-create',
                'display_name' => 'الدول',
                'guard_name' => 'web',
                'routes' => 'admin.workdays.create,admin.workdays.store',
            ], [
                'id' => '17',
                'name' => 'workday-edit',
                'display_name' => 'الدول',
                'guard_name' => 'web',
                'routes' => 'admin.workdays.edit,admin.workdays.update',
            ], [
                'id' => '18',
                'name' => 'workday-delete',
                'display_name' => 'الدول',
                'guard_name' => 'web',
                'routes' => 'admin.workdays.destroy',
            ], [
                'id' => '19',
                'name' => 'country-list',
                'display_name' => 'الدول',
                'guard_name' => 'web',
                'routes' => 'admin.countries.index',
            ], [
                'id' => '20',
                'name' => 'country-create',
                'display_name' => 'الدول',
                'guard_name' => 'web',
                'routes' => 'admin.countries.create,admin.countries.store',
            ], [
                'id' => '21',
                'name' => 'country-edit',
                'display_name' => 'الدول',
                'guard_name' => 'web',
                'routes' => 'admin.countries.edit,admin.countries.update',
            ], [
                'id' => '22',
                'name' => 'country-delete',
                'display_name' => 'الدول',
                'guard_name' => 'web',
                'routes' => 'admin.countries.destroy',
            ], [
                'id' => '23',
                'name' => 'slot-list',
                'display_name' => 'الفترات / المواعيد',
                'guard_name' => 'web',
                'routes' => 'admin.slots.index',
            ], [
                'id' => '24',
                'name' => 'slot-create',
                'display_name' => 'الفترات / المواعيد',
                'guard_name' => 'web',
                'routes' => 'admin.slots.create,admin.slots.store',
            ], [
                'id' => '25',
                'name' => 'slot-edit',
                'display_name' => 'الفترات / المواعيد',
                'guard_name' => 'web',
                'routes' => 'admin.slots.edit,admin.slots.update',
            ], [
                'id' => '26',
                'name' => 'slot-delete',
                'display_name' => 'الفترات / المواعيد',
                'guard_name' => 'web',
                'routes' => 'admin.slots.destroy',
            ], [
                'id' => '27',
                'name' => 'branch-list',
                'display_name' => 'الفروع',
                'guard_name' => 'web',
                'routes' => 'admin.branches.index',
            ], [
                'id' => '28',
                'name' => 'branch-create',
                'display_name' => 'الفروع',
                'guard_name' => 'web',
                'routes' => 'admin.branches.create,admin.branches.store',
            ], [
                'id' => '29',
                'name' => 'branch-edit',
                'display_name' => 'الفروع',
                'guard_name' => 'web',
                'routes' => 'admin.branches.edit,admin.branches.update',
            ], [
                'id' => '30',
                'name' => 'branch-delete',
                'display_name' => 'الفروع',
                'guard_name' => 'web',
                'routes' => 'admin.branches.destroy',
            ], [
                'id' => '31',
                'name' => 'branch-show',
                'display_name' => 'الفروع',
                'guard_name' => 'web',
                'routes' => 'admin.branches.show',
            ],
        ];


        Permission::insert($permissions);
    }
}
