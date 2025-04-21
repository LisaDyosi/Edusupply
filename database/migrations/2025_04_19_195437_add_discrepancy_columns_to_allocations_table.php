<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('allocations', function (Blueprint $table) {
        $table->integer('discrepancy')->nullable()->after('quantity');
        $table->string('discrepancy_status')->default('Pending')->after('discrepancy');
    });
}

public function down()
{
    Schema::table('allocations', function (Blueprint $table) {
        $table->dropColumn(['discrepancy', 'discrepancy_status']);
    });
}

};
