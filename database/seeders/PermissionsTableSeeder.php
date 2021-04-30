<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'team_create',
            ],
            [
                'id'    => 18,
                'title' => 'team_edit',
            ],
            [
                'id'    => 19,
                'title' => 'team_show',
            ],
            [
                'id'    => 20,
                'title' => 'team_delete',
            ],
            [
                'id'    => 21,
                'title' => 'team_access',
            ],
            [
                'id'    => 22,
                'title' => 'lead_create',
            ],
            [
                'id'    => 23,
                'title' => 'lead_edit',
            ],
            [
                'id'    => 24,
                'title' => 'lead_show',
            ],
            [
                'id'    => 25,
                'title' => 'lead_delete',
            ],
            [
                'id'    => 26,
                'title' => 'lead_access',
            ],
            [
                'id'    => 27,
                'title' => 'lead_status_create',
            ],
            [
                'id'    => 28,
                'title' => 'lead_status_edit',
            ],
            [
                'id'    => 29,
                'title' => 'lead_status_show',
            ],
            [
                'id'    => 30,
                'title' => 'lead_status_delete',
            ],
            [
                'id'    => 31,
                'title' => 'lead_status_access',
            ],
            [
                'id'    => 32,
                'title' => 'lead_status_group_create',
            ],
            [
                'id'    => 33,
                'title' => 'lead_status_group_edit',
            ],
            [
                'id'    => 34,
                'title' => 'lead_status_group_show',
            ],
            [
                'id'    => 35,
                'title' => 'lead_status_group_delete',
            ],
            [
                'id'    => 36,
                'title' => 'lead_status_group_access',
            ],
            [
                'id'    => 37,
                'title' => 'setting_access',
            ],
            [
                'id'    => 38,
                'title' => 'lead_followup_create',
            ],
            [
                'id'    => 39,
                'title' => 'lead_followup_edit',
            ],
            [
                'id'    => 40,
                'title' => 'lead_followup_show',
            ],
            [
                'id'    => 41,
                'title' => 'lead_followup_delete',
            ],
            [
                'id'    => 42,
                'title' => 'lead_followup_access',
            ],
            [
                'id'    => 43,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 44,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 45,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 46,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 47,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 48,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 49,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
