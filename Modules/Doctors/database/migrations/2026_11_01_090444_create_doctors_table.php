
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->foreignId('specialty_id')
                ->constrained('specialties')
                ->restrictOnDelete();

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

            $table->unsignedSmallInteger('experience_years')
                ->nullable();

            $table->text('about')->nullable();

            $table->string('profile_image')->nullable();

            $table->boolean('is_published')->default(false);

            $table->timestamps();

            $table->index(
                ['area_id', 'is_published'],
                'doctors_area_published_index'
            );

            $table->index(
                ['specialty_id', 'is_published'],
                'doctors_specialty_published_index'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
