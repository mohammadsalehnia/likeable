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
        Schema::create('likeable_likes', function (Blueprint $table) {
            $table->id();
            $table->morphs('likeable');
//            $table->string('likeable_id', 36);
//            $table->string('likeable_type', 36);
            $table->foreignId('user_id')->constrained();
//            $table->string('user_id', 36)->index();
            $table->timestamps();
            $table->unique(['likeable_id', 'likeable_type', 'user_id'], 'likeable_likes_unique');
        });

        Schema::create('likeable_like_counters', function (Blueprint $table) {
            $table->id();
            $table->morphs('likeable');
//            $table->string('likeable_id', 36);
//            $table->string('likeable_type', 36);
            $table->unsignedBigInteger('count')->default(0);
            $table->unique(['likeable_id', 'likeable_type'], 'likeable_counts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likeable_likes');
        Schema::dropIfExists('likeable_like_counters');
    }
};
