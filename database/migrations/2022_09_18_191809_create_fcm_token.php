<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcmToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcm_token', function (Blueprint $table) {
            $table->string('oauth_id', 100)->index();
            $table->text('oauth_token');
            $table->string('token', 255);
            $table->foreignUuid('user_id')->constrained('users')->onUpdate('cascade');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('fcm_token');
    }
}
