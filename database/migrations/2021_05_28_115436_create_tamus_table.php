<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamusTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tamus', function (Blueprint $table) {
			$table->id();
			$table->string('nama_tamu');
			/**
			 * Untuk jenis kelamin:
			 * 0 = Laki-laki
			 * 1 = Perempuan
			 * Tidak ada lagi selain itu!
			 */
			$table->enum('jenis_kelamin', [0, 1]);
			$table->string('jabatan')->nullable();
			$table->string('instansi')->nullable();
			$table->string('ket');
			$table->string('tujuan');
			$table->enum('status',[0,1]);
			$table->string('user');
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
		Schema::dropIfExists('tamus');
	}
}
