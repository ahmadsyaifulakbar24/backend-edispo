<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS vw_disposition_assigment_Detail");
        DB::statement("
            CREATE VIEW vw_disposition_assigment_Detail as
            SELECT 
                a.id,
                a.mail_disposition_id,
                a.receiver_id,
                a.activity_log_id,
                a.read,
                a.created_at,
                a.updated_at,
                b.mail_id,
                b.description,
                c.mail_number
            FROM disposition_assigments as a
            LEFT JOIN mail_dispositions as b ON a.mail_disposition_id = b.id
            LEFT JOIN mails as c ON b.mail_id = c.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view');
    }
}
