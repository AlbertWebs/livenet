<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('internet_plans', function (Blueprint $table) {
            $table->string('image')->nullable()->after('badge');
            $table->boolean('show_image')->default(true)->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('internet_plans', function (Blueprint $table) {
            $table->dropColumn(['image', 'show_image']);
        });
    }
};
