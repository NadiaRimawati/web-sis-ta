<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('crime_incident', function (Blueprint $table) {
            $table->id(); // This will create the 'id' column as an auto-incrementing integer primary key.
            $table->enum('regency', ['Gayo Lues', 'Pidie Jaya', 'Kota Subulussalam', 'Kota Lhokseumawe', 'Pidie', 'Nagan Raya', 'Simeulue', 'Kota Sabang', 'Aceh Barat', 'Bener Meriah', 'Aceh Besar', 'Aceh Singkil', 'Aceh Tamiang', 'Aceh Barat Daya', 'Aceh Utara', 'Aceh Jaya', 'Aceh Tengah', 'Kota Langsa', 'Aceh Tenggara', 'Aceh Timur', 'Bireuen', 'Kota Banda Aceh', 'Aceh Selatan']); // Replace with actual enum values.
            $table->string('years'); // Using string for varchar2.
            $table->integer('CT');
            $table->integer('totalP21');
            $table->integer('totalTahap2'); // Fixed spelling of 'integer'.
            $table->integer('totalRJ');
            $table->integer('totalSP3');
            $table->integer('totalSP2LID');
            $table->timestamps(); // This will create 'created_at' and 'updated_at' columns.
        });
    }

    public function down()
    {
        Schema::dropIfExists('crime_incident');
    }
};
