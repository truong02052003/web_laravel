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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->string('email',200);
            $table->string('phone',50);
            $table->string('address');
            $table->integer('customer_id')->unsigned();
            $table->string('status')->default('default_status_value'); // Thêm giá trị mặc định ở đây
            $table->string('token')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
