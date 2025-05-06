<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('allocations', function (Blueprint $table) {
        $table->timestamp('in_transit_at')->nullable()->after('status');
        $table->timestamp('delivered_at')->nullable()->after('in_transit_at');
    });
}

public function down()
{
    Schema::table('allocations', function (Blueprint $table) {
        $table->dropColumn(['in_transit_at', 'delivered_at']);
    });
}

};
