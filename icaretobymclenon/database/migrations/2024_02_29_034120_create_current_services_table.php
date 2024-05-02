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
        Schema::create('current_services', function (Blueprint $table) {            
            $table->unsignedBigInteger('cust_id');
            $table->string('service_type');
            $table->boolean('has_service');
            $table->boolean('looking');
            $table->smallInteger('current_cost');
            $table->string('contract_exp');
            $table->string('description');
            $table->smallInteger('quantity');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            
            $table->primary(['has_service', 'cust_id', 'service_type']);
            
            $table->foreign('cust_id')->references('id')->on('customers')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreign('service_type')->references('service_type')->on('services')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('current_services');
    }
};
