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
                'display_name' => 'ايام العمل',
                'guard_name' => 'web',
                'routes' => 'admin.workdays.index',
            ], [
                'id' => '16',
                'name' => 'workday-create',
                'display_name' => 'ايام العمل',
                'guard_name' => 'web',
                'routes' => 'admin.workdays.create,admin.workdays.store',
            ], [
                'id' => '17',
                'name' => 'workday-edit',
                'display_name' => 'ايام العمل',
                'guard_name' => 'web',
                'routes' => 'admin.workdays.edit,admin.workdays.update',
            ], [
                'id' => '18',
                'name' => 'workday-delete',
                'display_name' => 'ايام العمل',
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
            ], [
                'id' => '32',
                'name' => 'payment-method-list',
                'display_name' => 'طرق الدفع',
                'guard_name' => 'web',
                'routes' => 'admin.payment-methods.index',
            ], [
                'id' => '33',
                'name' => 'payment-method-create',
                'display_name' => 'طرق الدفع',
                'guard_name' => 'web',
                'routes' => 'admin.payment-methods.create,admin.payment-methods.store',
            ], [
                'id' => '34',
                'name' => 'payment-method-edit',
                'display_name' => 'طرق الدفع',
                'guard_name' => 'web',
                'routes' => 'admin.payment-methods.edit,admin.payment-methods.update',
            ], [
                'id' => '35',
                'name' => 'payment-method-delete',
                'display_name' => 'طرق الدفع',
                'guard_name' => 'web',
                'routes' => 'admin.payment-methods.destroy',
            ], [
                'id' => '36',
                'name' => 'lang',
                'display_name' => 'اللغات',
                'guard_name' => 'web',
                'routes' => 'admin.lang',
            ], [
                'id' => '37',
                'name' => 'teacher-list',
                'display_name' => 'المدرسين',
                'guard_name' => 'web',
                'routes' => 'admin.teachers.index',
            ], [
                'id' => '38',
                'name' => 'teacher-create',
                'display_name' => 'المدرسين',
                'guard_name' => 'web',
                'routes' => 'admin.teachers.create,admin.teachers.store',
            ], [
                'id' => '39',
                'name' => 'teacher-edit',
                'display_name' => 'المدرسين',
                'guard_name' => 'web',
                'routes' => 'admin.teachers.edit,admin.teachers.update',
            ], [
                'id' => '40',
                'name' => 'teacher-show',
                'display_name' => 'المدرسين',
                'guard_name' => 'web',
                'routes' => 'admin.teachers.show',
            ], [
                'id' => '41',
                'name' => 'teacher-delete',
                'display_name' => 'المدرسين',
                'guard_name' => 'web',
                'routes' => 'admin.teachers.destroy',
            ], [
                'id' => '42',
                'name' => 'system-list',
                'display_name' => 'الانظمه',
                'guard_name' => 'web',
                'routes' => 'admin.systems.index',
            ], [
                'id' => '43',
                'name' => 'system-create',
                'display_name' => 'الانظمه',
                'guard_name' => 'web',
                'routes' => 'admin.systems.create,admin.systems.store',
            ], [
                'id' => '44',
                'name' => 'system-edit',
                'display_name' => 'الانظمه',
                'guard_name' => 'web',
                'routes' => 'admin.systems.edit,admin.systems.update',
            ], [
                'id' => '45',
                'name' => 'system-delete',
                'display_name' => 'الانظمه',
                'guard_name' => 'web',
                'routes' => 'admin.systems.destroy',
            ], [
                'id' => '46',
                'name' => 'subject-list',
                'display_name' => 'المواد',
                'guard_name' => 'web',
                'routes' => 'admin.subjects.index',
            ], [
                'id' => '47',
                'name' => 'subject-create',
                'display_name' => 'المواد',
                'guard_name' => 'web',
                'routes' => 'admin.subjects.create,admin.subjects.store',
            ], [
                'id' => '48',
                'name' => 'subject-edit',
                'display_name' => 'المواد',
                'guard_name' => 'web',
                'routes' => 'admin.subjects.edit,admin.subjects.update',
            ], [
                'id' => '49',
                'name' => 'subject-show',
                'display_name' => 'المواد',
                'guard_name' => 'web',
                'routes' => 'admin.subjects.show',
            ], [
                'id' => '50',
                'name' => 'subject-delete',
                'display_name' => 'المواد',
                'guard_name' => 'web',
                'routes' => 'admin.subjects.destroy',
            ], [
                'id' => '51',
                'name' => 'order-list',
                'display_name' => 'الطلبات',
                'guard_name' => 'web',
                'routes' => 'admin.orders.index',
            ],
        ];


        Permission::insert($permissions);
    }
}
