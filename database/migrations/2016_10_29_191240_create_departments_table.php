<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('oldId')->unsigned()->nullable();
            $table->integer('owner_id')->index();
            $table->string('email')->unique()->nullable();
            $table->text('photo_url')->nullable();
            $table->string('fdid')->nullable();
            $table->string('name');
            $table->string('hq_address1')->nullable();
            $table->string('hq_address2')->nullable();
            $table->string('hq_city')->nullable();
            $table->char('hq_state', 2)->nullable();
            $table->string('hq_zip')->nullable();
            $table->string('mail_address1')->nullable();
            $table->string('mail_address2')->nullable();
            $table->string('mail_po_box')->nullable();
            $table->string('mail_city')->nullable();
            $table->char('mail_state', 2)->nullable();
            $table->string('mail_zip')->nullable();
            $table->string('hq_phone')->nullable();
            $table->string('hq_fax')->nullable();
            $table->string('county')->nullable();
            $table->enum('dept_type', ['Career', 'Volunteer', 'Mostly Career', 'Mostly Volunteer']);
            $table->string('org_type')->nullable();
            $table->string('website')->nullable();
            $table->smallInteger('stations')->nullable();
            $table->smallInteger('active_ff_career')->nullable();
            $table->smallInteger('active_ff_volunteer')->nullable();
            $table->smallInteger('active_ff_paid_per_call')->nullable();
            $table->smallInteger('non_ff_civilian')->nullable();
            $table->smallInteger('non_ff_volunteer')->nullable();
            $table->boolean('primary_agency_for_em')->nullable();
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
        Schema::dropIfExists('departments');
    }
}
