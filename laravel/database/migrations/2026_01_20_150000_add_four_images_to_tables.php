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
        // Add 4 image columns to product_requests table
        Schema::table('product_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('product_requests', 'image2')) {
                $table->string('image2')->nullable()->after('image');
            }
            if (!Schema::hasColumn('product_requests', 'image3')) {
                $table->string('image3')->nullable()->after('image2');
            }
            if (!Schema::hasColumn('product_requests', 'image4')) {
                $table->string('image4')->nullable()->after('image3');
            }
        });

        // Add 4 image columns to tools table
        Schema::table('tools', function (Blueprint $table) {
            if (!Schema::hasColumn('tools', 'image2')) {
                $table->string('image2')->nullable()->after('image');
            }
            if (!Schema::hasColumn('tools', 'image3')) {
                $table->string('image3')->nullable()->after('image2');
            }
            if (!Schema::hasColumn('tools', 'image4')) {
                $table->string('image4')->nullable()->after('image3');
            }
        });

        // Add 4 image columns to fertilizers table
        Schema::table('fertilizers', function (Blueprint $table) {
            if (!Schema::hasColumn('fertilizers', 'image2')) {
                $table->string('image2')->nullable()->after('image');
            }
            if (!Schema::hasColumn('fertilizers', 'image3')) {
                $table->string('image3')->nullable()->after('image2');
            }
            if (!Schema::hasColumn('fertilizers', 'image4')) {
                $table->string('image4')->nullable()->after('image3');
            }
        });

        // Add 4 image columns to crops table
        Schema::table('crops', function (Blueprint $table) {
            if (!Schema::hasColumn('crops', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('crops', 'image2')) {
                $table->string('image2')->nullable();
            }
            if (!Schema::hasColumn('crops', 'image3')) {
                $table->string('image3')->nullable();
            }
            if (!Schema::hasColumn('crops', 'image4')) {
                $table->string('image4')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_requests', function (Blueprint $table) {
            $table->dropColumn(['image2', 'image3', 'image4']);
        });

        Schema::table('tools', function (Blueprint $table) {
            $table->dropColumn(['image2', 'image3', 'image4']);
        });

        Schema::table('fertilizers', function (Blueprint $table) {
            $table->dropColumn(['image2', 'image3', 'image4']);
        });

        Schema::table('crops', function (Blueprint $table) {
            $table->dropColumn(['image2', 'image3', 'image4']);
        });
    }
};
