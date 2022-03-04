<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingDispositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_dispositions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->onUpdate('cascade');
            $table->integer('agenda_number');
            $table->string('mail_number');
            $table->string('mail_origin');
            $table->string('regarding');
            $table->date('mail_date');
            $table->date('date_received');
            $table->foreignUuid('mail_nature_id')->constrained('params')->onUpdate('cascade');
            $table->foreignUuid('mail_security_id')->constrained('params')->onUpdate('cascade');
            $table->string('summary');
            $table->string('description');
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
        Schema::dropIfExists('incoming_dispositions');
    }
}
