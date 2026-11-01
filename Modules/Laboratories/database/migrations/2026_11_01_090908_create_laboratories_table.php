
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('area_id')
                ->constrained('areas')
                ->restrictOnDelete();

            $table->string('name', 150);
            $table->string('address', 255);
            $table->string('map_url', 2048)->nullable();

            $table->string('phone', 30)->nullable();
            $table->string('mobile', 30)->nullable();
            $table->string('whatsapp', 30)->nullable();
            $table->string('email')->nullable();

            $table->text('description')->nullable();
            $table->string('image')->nullable();

            $table->boolean('home_visit')->default(false);
            $table->boolean('is_published')->default(false);

            $table->timestamps();

            $table->index(
                ['area_id', 'is_published'],
                'laboratories_area_published_index'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laboratories');
    }
};
