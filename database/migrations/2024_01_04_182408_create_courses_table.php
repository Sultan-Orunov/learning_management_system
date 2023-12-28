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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instructor_id')->index()->constrained('users');
            $table->foreignId('category_id')->index()->constrained('categories');
            $table->foreignId('subcategory_id')->index()->constrained('sub_categories');
            $table->string('image')->nullable();
            $table->text('title')->nullable();
            $table->text('name')->nullable();
            $table->string('name_slug')->nullable();

            $table->text('description')->nullable();
            $table->string('video')->nullable();
            $table->string('label')->nullable();
            $table->string('duration')->nullable();
            $table->string('resources')->nullable();
            $table->string('certificate')->nullable();

            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('prerequisites')->nullable();
            $table->string('bestseller')->nullable();
            $table->string('featured')->nullable();
            $table->string('highestrated')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=InActive', '1=Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
