<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadStatusLeadStatusGroupPivotTable extends Migration
{
    public function up()
    {
        Schema::create('lead_status_lead_status_group', function (Blueprint $table) {
            $table->unsignedBigInteger('lead_status_group_id');
            $table->foreign('lead_status_group_id', 'lead_status_group_id_fk_3791350')->references('id')->on('lead_status_groups')->onDelete('cascade');
            $table->unsignedBigInteger('lead_status_id');
            $table->foreign('lead_status_id', 'lead_status_id_fk_3791350')->references('id')->on('lead_statuses')->onDelete('cascade');
        });
    }
}
