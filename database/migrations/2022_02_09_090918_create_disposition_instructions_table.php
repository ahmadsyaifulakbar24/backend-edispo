<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositionInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposition_instructions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('mail_disposition_id')->constrained('mail_dispositions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('instruction_id')->constrained('params')->onUpdate('cascade');
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
        Schema::dropIfExists('disposition_instructions');
    }
}
