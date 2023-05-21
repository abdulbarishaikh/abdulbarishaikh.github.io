<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_job_experience', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('type',100);
            $table->string('company_name',200);
            $table->text('description');
            $table->datetime('start_year');
            $table->datetime('end_year');
            $table->string('location_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_job_experience');
    }
};
