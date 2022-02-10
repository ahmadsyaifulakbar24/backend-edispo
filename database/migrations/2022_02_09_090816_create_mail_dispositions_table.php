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
            $table->foreignUuid('mail_id')->constrained('mails')->onUpdate('cascade')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->foreignUuid('mail_security_id')->constrained('params')->onUpdate('cascade');
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
