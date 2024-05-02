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
        Schema::create('offered_services', function (Blueprint $table) {
            $table->bigInteger('bus_id')->unsigned();
            $table->string('service_type');
            $table->smallInteger('service_cost');
            $table->boolean('has_contract');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            
            $table->primary(['has_contract', 'bus_id', 'service_type']);
            
            $table->foreign('bus_id')->references('id')->on('businesses')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreign('service_type')->references('service_type')->on('services')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offered_services');
    }
};
