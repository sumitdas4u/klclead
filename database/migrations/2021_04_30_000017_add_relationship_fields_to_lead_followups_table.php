<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLeadFollowupsTable extends Migration
{
    public function up()
    {
        Schema::table('lead_followups', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_3799220')->references('id')->on('users');
            $table->unsignedBigInteger('lead_status_id')->nullable();
            $table->foreign('lead_status_id', 'lead_status_fk_3799221')->references('id')->on('lead_statuses');
        });
    }
}
