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
        Schema::table('fertilizers', function (Blueprint $table) {
            if (!Schema::hasColumn('fertilizers', 'title')) {
                $table->string('title');
            }
            if (!Schema::hasColumn('fertilizers', 'price')) {
                $table->decimal('price', 10, 2);
            }
            if (!Schema::hasColumn('fertilizers', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('fertilizers', 'description')) {
                $table->text('description')->nullable();
            }
            if (!Schema::hasColumn('fertilizers', 'status')) {
                $table->string('status')->default('in_stock');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fertilizers', function (Blueprint $table) {
            if (Schema::hasColumn('fertilizers', 'status')) {
                $table->dropColumn('status');
            }
            if (Schema::hasColumn('fertilizers', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('fertilizers', 'image')) {
                $table->dropColumn('image');
            }
            if (Schema::hasColumn('fertilizers', 'price')) {
                $table->dropColumn('price');
            }
            if (Schema::hasColumn('fertilizers', 'title')) {
                $table->dropColumn('title');
            }
        });
    }
};
