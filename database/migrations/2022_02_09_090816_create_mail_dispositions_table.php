<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailDispositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_dispositions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type'); // ['mail', 'nota dinas', 'incoming disposition', 'agenda']
            $table->foreignUuid('mail_id')->nullable()->constrained('mails')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('incoming_disposition_id')->nullable()->constrained('incoming_dispositions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('agenda_id')->nullable()->constrained('agendas')->onUpdate('cascade')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->foreignUuid('sender_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('disposition')->default(0);
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
        Schema::dropIfExists('mail_dispositions');
    }
}
