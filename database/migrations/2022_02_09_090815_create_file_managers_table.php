<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_managers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type'); // ['mail', 'incoming disposition', 'agenda']
            $table->foreignUuid('mail_id')->nullable()->constrained('mails')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('incoming_disposition_id')->nullable()->constrained('incoming_dispositions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('agenda_id')->nullable()->constrained('agendas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('path');
            $table->string('file_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_managers');
    }
}
