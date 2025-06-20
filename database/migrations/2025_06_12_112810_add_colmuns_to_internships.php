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
        Schema::table('internships', function (Blueprint $table) {
            $table->string('location');
            $table->string('gender');
            $table->string('education');
            $table->text('requirements');
            $table->string('email');
            $table->string('time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('internships', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->dropColumn('gender');
            $table->dropColumn('education');
            $table->dropColumn('requirements');
            $table->dropColumn('email');
            $table->dropColumn('time');
        });
    }
};
