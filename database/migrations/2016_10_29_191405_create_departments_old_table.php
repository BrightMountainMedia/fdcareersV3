<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsOldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments_old', function (Blueprint $table) {
            $table->bigIncrements('department_id');
            $table->string('department_name');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('county');
            $table->string('state', 2);
            $table->string('zip');
            $table->smallInteger('stations')->unsigned()->nullable();
            $table->integer('yearly_call_volume')->unsigned()->nullable();
            $table->integer('population_served')->unsigned()->nullable();
            $table->smallInteger('fulltimers')->unsigned()->nullable();
            $table->smallInteger('parttimers')->unsigned()->nullable();
            $table->smallInteger('paid_oncallers')->unsigned()->nullable();
            $table->smallInteger('volunteers')->unsigned()->nullable();
            $table->smallInteger('civilians')->unsigned()->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('url')->nullable();
            $table->bigInteger('hq_address')->unsigned()->nullable();
            $table->bigInteger('mailing_address')->unsigned()->nullable();
            $table->string('mailing_address1');
            $table->string('mailing_address2');
            $table->string('mailing_city');
            $table->string('mailing_state', 2);
            $table->string('mailing_zip');
            $table->enum('dept_type', ['career', 'volunteer', 'mostly career', 'mostly volunteer'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments_old');
    }
}
