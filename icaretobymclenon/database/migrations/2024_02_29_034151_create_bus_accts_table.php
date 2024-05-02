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
        Schema::create('bus_accts', function (Blueprint $table) {
            $table->bigInteger('bus_id')->unsigned();
            $table->bigInteger('acct_no')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            
            //$table->primary(['bus_id', 'acct_no']);
            
            $table->foreign('bus_id')->references('id')->on('businesses');
            
            $table->foreign('acct_no')->references('acct_no')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_accts');
    }
};
