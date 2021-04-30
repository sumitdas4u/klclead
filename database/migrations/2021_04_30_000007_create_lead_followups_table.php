<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadFollowupsTable extends Migration
{
    public function up()
    {
        Schema::create('lead_followups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
