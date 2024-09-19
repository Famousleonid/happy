<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('viewable_id'); // ID просматриваемого объекта
            $table->string('viewable_type');
            $table->date('view_date');
            $table->unsignedBigInteger('views_count')->default(0); // Количество просмотров
            $table->string('ip_address');
            $table->string('country')->nullable();
            $table->timestamps();

            $table->unique(['viewable_id', 'viewable_type', 'view_date', 'ip_address'], 'unique_view');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('views');
    }
};
