<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityIdCountryIdToOrganisationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organisation', function (Blueprint $table) {
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('county_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade');
            $table->foreign('county_id')->references('id')->on('county')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation', function (Blueprint $table) {
            //
        });
    }
}
