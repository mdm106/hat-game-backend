<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string("word", 50);
            $table->timestamps();

            //create the category_id column for one to many relationship
            $table->foreignId("category_id")->unsigned();

            //set up the foreign key constraint, this tells MySQL that the category_id column references the id column on the articles table
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
            //also tells MySQL to automatically remove any words linked to categories that are deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
}
