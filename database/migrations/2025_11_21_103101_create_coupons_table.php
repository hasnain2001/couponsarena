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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->nullable()->constrained('language')->nullOnDelete();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('code')->nullable();
            $table->integer('top_coupons')->nullable()->default(0);
            $table->integer('clicks')->nullable()->default(0);
            $table->integer('order')->default(0);
            $table->longText('destination_url');
            $table->string('ending_date');
            $table->string('status');
            $table->string('authentication');
            $table->string('store');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
