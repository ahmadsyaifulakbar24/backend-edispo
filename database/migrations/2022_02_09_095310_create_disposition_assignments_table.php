<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositionAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposition_assignments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('mail_disposition_id')->constrained('mail_dispositions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('receiver_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->text('position_name');
            $table->uuid('activity_log_id');
            $table->boolean('read')->default(0);
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
        Schema::dropIfExists('disposition_assignments');
    }
}
