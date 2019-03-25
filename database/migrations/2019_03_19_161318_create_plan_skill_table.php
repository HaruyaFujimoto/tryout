<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_skill', function (Blueprint $table) {
            $table->bigInteger('plan_id')->unsigned();
            $table->bigInteger('skill_id')->unsigned();
            $table->primary(['plan_id', 'skill_id'])->unique();

            $table->foreign('plan_id')
                ->references('id')->on('plans')
                ->onDelete('cascade');
            $table->foreign('skill_id')
                ->references('id')->on('skills')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_skill');
    }
}
