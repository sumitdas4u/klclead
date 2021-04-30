<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Team
    Route::apiResource('teams', 'TeamApiController');

    // Leads
    Route::apiResource('leads', 'LeadsApiController');

    // Lead Status
    Route::apiResource('lead-statuses', 'LeadStatusApiController');

    // Lead Status Group
    Route::apiResource('lead-status-groups', 'LeadStatusGroupApiController');

    // Lead Followups
    Route::apiResource('lead-followups', 'LeadFollowupsApiController');
});
