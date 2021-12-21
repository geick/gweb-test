<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpecialCasesToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('value_missing');
            $table->boolean('value_invalid');
            $table->boolean('value_exceeding');
            $table->boolean('receipt_status_invalid');
            $table->integer('priority_case')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('value_missing');
            $table->dropColumn('value_invalid');
            $table->dropColumn('value_exceeding');
            $table->dropColumn('receipt_status_invalid');
            $table->dropColumn('priority_case');
        });
    }
}
