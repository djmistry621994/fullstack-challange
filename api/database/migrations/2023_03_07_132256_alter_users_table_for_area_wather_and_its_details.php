<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('weather')->nullable()->after('longitude');
            $table->text('weather_description')->nullable()->after('weather');
            $table->text('weather_object')->nullable()->after('weather_description');
            $table->timestamp('weather_timestamp')->nullable()->after('weather_object');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'weather',
                'weather_description',
                'weather_object',
                'weather_timestamp',
            ]);
        });
    }
};
