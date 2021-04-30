<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTeamsTable extends Migration
{
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->unsignedBigInteger('lead_status_group_id')->nullable();
            $table->foreign('lead_status_group_id', 'lead_status_group_fk_3791361')->references('id')->on('lead_status_groups');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id', 'owner_fk_3791058')->references('id')->on('users');
        });
    }
}
