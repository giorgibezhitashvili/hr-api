<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToCandidate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidate', function (Blueprint $table) {
            $table->enum('status', ['Initial', 'First Contact', 'Interview', 'Tech Assignment', 'Rejected', 'Hired'])->default('Initial');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidate', function (Blueprint $table) {
            //
        });
    }
}
