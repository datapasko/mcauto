<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->cascadeOnDelete();
            $table->string('registration')->nullable();
            $table->string('color')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->date('year')->nullable();
            $table->string('sticker')->nullable();
            $table->string('fuel')->nullable();
            $table->integer('km')->nullable();
            $table->integer('cv')->nullable();
            $table->string('transmission')->nullable();
            $table->integer('doors')->nullable();
            $table->integer('places')->nullable();
            $table->string('description')->nullable();
            $table->string('type_sale')->nullable();
            $table->date('sale_date')->nullable();
            $table->decimal('price', 8,2)->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
