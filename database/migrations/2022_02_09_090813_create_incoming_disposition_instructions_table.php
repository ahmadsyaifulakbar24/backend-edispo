<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingDispositionInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_disposition_instructions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_id')->comment('incoming_disposition_id')->constrained('incoming_dispositions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('instruction_id')->constrained('params')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_disposition_instructions');
    }
}
