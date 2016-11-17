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
            $table->string('salary')->nullable();
            $table->enum('position_type', ['full-time', 'paid-on-call', 'part-time', 'volunteer', 'contractor']);
            $table->char('state', 2);
            $table->text('application_details');
            $table->text('testing_details')->nullable();
            $table->text('orientation_details')->nullable();
            $table->text('requirements')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('residency_requirements')->nullable();
            $table->string('doc1_title')->nullable();
            $table->string('doc1_url')->nullable();
            $table->string('doc2_title')->nullable();
            $table->string('doc2_url')->nullable();
            $table->string('doc3_title')->nullable();
            $table->string('doc3_url')->nullable();
            $table->string('doc4_title')->nullable();
            $table->string('doc4_url')->nullable();
            $table->string('doc5_title')->nullable();
            $table->string('doc5_url')->nullable();
            $table->string('doc6_title')->nullable();
            $table->string('doc6_url')->nullable();
            $table->string('video')->nullable();
            $table->string('apply_link')->nullable();
            $table->enum('ending', ['untilFilled', 'continuous', 'duedate']);
            $table->timestamp('duedate')->nullable();
            $table->timestamp('applications_available_start')->nullable();
            $table->timestamp('applications_available_end')->nullable();
            $table->timestamp('publish')->nullable();
            $table->timestamps();
            $table->boolean('featured')->default(0);
            $table->boolean('active')->default(0);
            $table->boolean('imported')->default(0);
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
