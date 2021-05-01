<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLeadsTable extends Migration
{
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->unsignedBigInteger('lead_status_id')->nullable();
            $table->foreign('lead_status_id', 'lead_status_fk_3799571')->references('id')->on('lead_statuses');
            $table->unsignedBigInteger('assign_to_id')->nullable();
            $table->foreign('assign_to_id', 'assign_to_fk_3805307')->references('id')->on('users');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3791163')->references('id')->on('teams');
        });
    }
}
