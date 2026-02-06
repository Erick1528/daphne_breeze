<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->date('start_date')->nullable()->after('link');
            $table->date('end_date')->nullable()->after('start_date');
            $table->integer('discount_percent')->nullable()->after('end_date');
            $table->text('terms')->nullable()->after('discount_percent');
            $table->boolean('featured')->default(false)->after('terms');
        });
    }

    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn(['start_date', 'end_date', 'discount_percent', 'terms', 'featured']);
        });
    }
};
