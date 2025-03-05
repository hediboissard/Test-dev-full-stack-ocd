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
        
        if (!Schema::hasColumn('people', 'child_id')) {
            Schema::table('people', function (Blueprint $table) {
                $table->unsignedBigInteger('child_id')->nullable()->after('id');
            });
        }
    }

    public function down(): void
    {
        
        if (Schema::hasColumn('people', 'child_id')) {
            Schema::table('people', function (Blueprint $table) {
                $table->dropColumn('child_id');
            });
        }
    }
};
