<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{

	public function up()
	{
		// sections
		Schema::table('sections', function (Blueprint $table) {
			$table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('cascade')->onUpdate('cascade');
	    });
		// doctors
		Schema::table('docters', function (Blueprint $table) {
			$table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('cascade')->onUpdate('cascade');
	        $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
		});
        // nurses
		Schema::table('nurses', function (Blueprint $table) {
			$table->foreign('specialization_id')->references('id')->on('specializations')->onDelete('cascade')->onUpdate('cascade');
	        $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
		});
		//
		Schema::table('patients', function (Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood__types')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
			
	    });
	}

	public function down()
	{
		
	}
}
