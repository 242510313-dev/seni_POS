<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->unsignedInteger('cash_amount')->nullable()->after('total_pembayaran');
            $table->unsignedInteger('change_amount')->nullable()->after('cash_amount');
        });
    }

    public function down(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->dropColumn(['cash_amount', 'change_amount']);
        });
    }
};