
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('governorate_id')
                ->constrained('governorates')
                ->restrictOnDelete();

            $table->string('name', 150);

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->unique(
                ['governorate_id', 'name'],
                'areas_governorate_name_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
