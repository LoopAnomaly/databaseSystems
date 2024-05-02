<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->string('service_type')->primary();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
        
        DB::table('services')->insert(array('service_type' => '25GB_Internet'));
        DB::table('services')->insert(array('service_type' => '50GB_Internet'));
        DB::table('services')->insert(array('service_type' => '100GB_Internet'));
        DB::table('services')->insert(array('service_type' => 'Phone_Line'));
        DB::table('services')->insert(array('service_type' => 'Insurance'));
        DB::table('services')->insert(array('service_type' => 'Mortgage'));
        DB::table('services')->insert(array('service_type' => 'Lawn_Care'));
        DB::table('services')->insert(array('service_type' => 'Cleaning'));
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
