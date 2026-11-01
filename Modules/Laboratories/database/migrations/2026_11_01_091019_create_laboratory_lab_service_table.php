
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laboratory_lab_service', function (Blueprint $table) {
            $table->foreignId('laboratory_id')
                ->constrained('laboratories')
                ->cascadeOnDelete();

            $table->foreignId('lab_service_id')
                ->constrained('lab_services')
                ->restrictOnDelete();

            $table->primary(
                ['laboratory_id', 'lab_service_id'],
                'laboratory_lab_service_primary'
            );

            $table->index(
                'lab_service_id',
                'laboratory_lab_service_service_index'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laboratory_lab_service');
    }
};
