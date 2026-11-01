
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();

            $table->string('workable_type');
            $table->unsignedBigInteger('workable_id');

            $table->unsignedTinyInteger('day_of_week');

            $table->unsignedSmallInteger('start_minute');
            $table->unsignedSmallInteger('end_minute');

            $table->timestamps();

            $table->index(
                ['workable_type', 'workable_id', 'day_of_week'],
                'working_hours_workable_day_index'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('working_hours');
    }
};
