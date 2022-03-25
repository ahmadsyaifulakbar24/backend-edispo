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
            $table->string('mail_number');
            $table->string('mail_origin')->nullable();
            $table->string('regarding');
            $table->date('mail_date');
            $table->date('date_received');
            $table->enum('mail_category', ['incoming_mail', 'official_memo', 'tembusan', 'st_menteri']);
            $table->string('mail_category_code');
            $table->foreignUuid('mail_type_id')->nullable()->constrained('params')->onUpdate('cascade');
            $table->foreignUuid('mail_nature_id')->constrained('params')->onUpdate('cascade');
            $table->foreignUuid('mail_security_id')->constrained('params')->onUpdate('cascade');
            $table->string('summary');
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
        Schema::dropIfExists('mails');
    }
}
