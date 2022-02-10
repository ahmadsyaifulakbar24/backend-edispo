<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->onUpdate('cascade');
            $table->integer('agenda_number');
            $table->integer('mail_number');
            $table->string('mail_origin');
            $table->string('regarding');
            $table->string('mail_date');
            $table->enum('mail_category', ['incoming_mail', 'official_memo']);
            $table->foreignUuid('mail_type')->nullable()->constrained('params')->onUpdate('cascade');
            $table->foreignUuid('mail_nature')->nullable()->constrained('params')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
