<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cart_item', function (Blueprint $table) {
            $table->string('selected_option')->nullable()->after('price');
        });

        Schema::table('order_item', function (Blueprint $table) {
            $table->string('selected_option')->nullable()->after('total');
        });
    }

    public function down(): void
    {
        Schema::table('cart_item', function (Blueprint $table) {
            $table->dropColumn('selected_option');
        });
        Schema::table('order_item', function (Blueprint $table) {
            $table->dropColumn('selected_option');
        });
    }
};
