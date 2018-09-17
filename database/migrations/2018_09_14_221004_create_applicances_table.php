<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicances', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id');
            $table->integer('offer_id');
            
            $table->timestamp('viewed_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            
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
        Schema::dropIfExists('applicances');
    }
}
