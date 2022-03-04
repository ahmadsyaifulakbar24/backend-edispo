<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('type'); // ['mail', 'incoming disposition', 'agenda']
            $table->foreignUuid('mail_id')->nullable()->constrained('mails')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('incoming_disposition_id')->nullable()->constrained('incoming_dispositions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('agenda_id')->nullable()->constrained('agendas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('log');
            $table->timestamps();
        });

        Schema::table('disposition_assigments', function (Blueprint $table) {
            $table->foreign('activity_log_id')->references('id')->on('activity_logs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_logs');
    }
}
