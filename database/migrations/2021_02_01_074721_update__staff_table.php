<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Staff', function($table){
            $table->increments('id');
            $table->string('empNo');
            $table->string('empName');
            $table->string('company');
            $table->string('division');
            $table->string('department');
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
        Schema::table('Staff', function($table){
            $table->dropColumn('ID','EmpNo','EmpName','Company','Division','Department','Updated_Date','Created_Date');
        });
    }
}
