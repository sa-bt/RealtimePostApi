<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_feature', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('feature_id')->constrained()->onDelete('NO ACTION')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_features');
    }
}
