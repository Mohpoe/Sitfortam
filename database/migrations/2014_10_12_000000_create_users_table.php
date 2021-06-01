<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('nama')->unique();
			$table->string('nama_lengkap');
			/**
			 * Untuk jenis kelamin:
			 * 0 = Laki-laki
			 * 1 = Perempuan
			 * Tidak ada lagi selain itu!
			 */
			$table->enum('jenis_kelamin',[0,1]);
			$table->string('jabatan')->nullable();
			$table->string('password')->nullable();
			/**
			 * Peran terdiri dari:
			 * 0 = Developer (most powerful user)
			 * 1 = Admin (management of users)
			 * 2 = Pejabat (yang dikunjungi tamu) => teknisnya akan digunakan oleh stafnya
			 *     sebagaipengontrol status pejabat (ada | sibuk | tidak ada)
			 * 3 = Petugas piket (penerima tamu)
			 */
			$table->tinyInteger('peran');
			/**
			 * Status di sini maksudnya adalah status keberadaan
			 * 0 = Ada
			 * 1 = Sibuk
			 * 2 = Tidak ada
			 * Diset sebagai default null untuk user dengan status != pejabat
			 */
			$table->enum('status',[0,1,2])->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
