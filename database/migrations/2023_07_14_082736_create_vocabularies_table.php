<?php

use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVocabulariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('vocabularies', function (Blueprint $table) {
        //     $table->id();
        //     $table->text('vocabulary');
        //     $table->text('mean');
        //     $table->text('description')->nullable();
        //     $table->foreignId('lesson_id')->references('id')->on('lessons');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vocabularies');
    }
}
