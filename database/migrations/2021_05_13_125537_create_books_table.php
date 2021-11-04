<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->unique();
            $table->string('image_path');
            $table->string('author');
            $table->integer('rate');
            $table->decimal('original_price');
            $table->decimal('sale_price');
            $table->string('format');
            $table->string('publisher');
            $table->date('published');
            $table->string('genre');
            $table->integer('pages');
            $table->integer('quantity');
            $table->longText('description');
            $table->boolean('editor_book')->nullable();
            $table->boolean('today_book')->nullable();
            $table->boolean('trending_book')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
