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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title')->nullable();
            $table->string('content');
            $table->tinyInteger('status')->default(0)->comment('0 - yapılmadı , 1 - yapılıyor , 2 - ertelendi , 3 - iptal oldu');
            $table->dateTime('deadline')->nullable();
            $table->softDeletes();
            $table->timestamps();

            //onDelete bir tabloda bir veriyi sildiğiniz zaman ona bağlı olan herşeyi siler.
//            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
