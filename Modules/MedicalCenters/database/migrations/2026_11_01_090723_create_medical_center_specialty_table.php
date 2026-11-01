
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medical_center_specialty', function (Blueprint $table) {
            $table->foreignId('medical_center_id')
                ->constrained('medical_centers')
                ->cascadeOnDelete();

            $table->foreignId('specialty_id')
                ->constrained('specialties')
                ->restrictOnDelete();

            $table->primary(
                ['medical_center_id', 'specialty_id'],
                'medical_center_specialty_primary'
            );

            $table->index(
                'specialty_id',
                'medical_center_specialty_specialty_index'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medical_center_specialty');
    }
};
