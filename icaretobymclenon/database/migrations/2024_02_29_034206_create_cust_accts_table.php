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
        Schema::create('cust_accts', function (Blueprint $table) {
            $table->bigInteger('cust_id')->unsigned();
            $table->bigInteger('acct_no')->unsigned();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            
            //$table->primary(['cust_id', 'acct_no']);
            
            $table->foreign('cust_id')->references('id')->on('customers')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreign('acct_no')->references('acct_no')->on('accounts')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cust_accts');
    }
};
