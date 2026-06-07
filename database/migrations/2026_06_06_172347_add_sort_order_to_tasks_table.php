<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('tasks', 'sort_order')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->unsignedInteger('sort_order')->default(0)->index()->after('priority');
            });
        }

        DB::table('tasks')
            ->orderBy('id')
            ->pluck('id')
            ->values()
            ->each(function ($id, $index) {
                DB::table('tasks')
                    ->where('id', $id)
                    ->update(['sort_order' => $index + 1]);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('tasks', 'sort_order')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->dropIndex(['sort_order']);
                $table->dropColumn('sort_order');
            });
        }
    }
};
