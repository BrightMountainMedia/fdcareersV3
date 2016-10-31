<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->index();
            $table->string('title');
            $table->enum('position_type', ['full-time', 'paid-on-call', 'part-time', 'volunteer', 'contractor']);
            $table->char('state', 2);
            $table->enum('ending', ['untilFilled', 'continuous', 'duedate']);
            $table->dateTime('duedate')->nullable();
            $table->text('application_details');
            $table->text('qualifications_to_apply')->nullable();
            $table->dateTime('applications_available_start')->nullable();
            $table->dateTime('applications_available_end')->nullable();
            $table->string('residency_requirements')->nullable();
            $table->string('where_to_get_apps_label');
            $table->string('where_to_get_apps_address1')->nullable();
            $table->string('where_to_get_apps_address2')->nullable();
            $table->string('where_to_get_apps_city')->nullable();
            $table->char('where_to_get_apps_state', 2)->nullable();
            $table->string('where_to_get_apps_zip')->nullable();
            $table->string('where_to_return_apps_label')->nullable();
            $table->string('where_to_return_apps_address1')->nullable();
            $table->string('where_to_return_apps_address2')->nullable();
            $table->string('where_to_return_apps_city')->nullable();
            $table->char('where_to_return_apps_state', 2)->nullable();
            $table->string('where_to_return_apps_zip')->nullable();
            $table->text('orientation_details')->nullable();
            $table->string('orientation_label')->nullable();
            $table->string('orientation_address1')->nullable();
            $table->string('orientation_address2')->nullable();
            $table->string('orientation_city')->nullable();
            $table->char('orientation_state', 2)->nullable();
            $table->string('orientation_zip')->nullable();
            $table->text('written_exam_details')->nullable();
            $table->string('written_exam_label')->nullable();
            $table->string('written_exam_address1')->nullable();
            $table->string('written_exam_address2')->nullable();
            $table->string('written_exam_city')->nullable();
            $table->char('written_exam_state', 2)->nullable();
            $table->string('written_exam_zip')->nullable();
            $table->text('physical_details')->nullable();
            $table->string('physical_label')->nullable();
            $table->string('physical_address1')->nullable();
            $table->string('physical_address2')->nullable();
            $table->string('physical_city')->nullable();
            $table->char('physical_state', 2)->nullable();
            $table->string('physical_zip')->nullable();
            $table->string('doc1_title')->nullable();
            $table->text('doc1_url')->nullable();
            $table->string('doc2_title')->nullable();
            $table->text('doc2_url')->nullable();
            $table->string('doc3_title')->nullable();
            $table->text('doc3_url')->nullable();
            $table->string('doc4_title')->nullable();
            $table->text('doc4_url')->nullable();
            $table->string('doc5_title')->nullable();
            $table->text('doc5_url')->nullable();
            $table->string('doc6_title')->nullable();
            $table->text('doc6_url')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('active')->default(0);
            $table->timestamp('reminder_sent')->nullable();
            $table->timestamp('publish')->nullable();
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
        Schema::dropIfExists('positions');
    }
}
