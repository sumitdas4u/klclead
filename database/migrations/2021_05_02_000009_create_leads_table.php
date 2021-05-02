<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp_no')->nullable();
            $table->string('alternative_number')->nullable();
            $table->string('localtion')->nullable();
            $table->string('address')->nullable();
            $table->string('interest')->nullable();
            $table->string('comment')->nullable();
            $table->string('source')->nullable();
            $table->string('utm')->nullable();
            $table->string('utm_campaign')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('ip')->nullable();
            $table->date('followup_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
