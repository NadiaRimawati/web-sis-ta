<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('crime_exist', function (Blueprint $table) {
            $table->id(); // Creates the 'id' column as an auto-incrementing integer primary key.
            $table->boolean('pencurian')->default(false);
            $table->boolean('penipuan')->default(false);
            $table->boolean('penggelapan')->default(false);
            $table->boolean('perjudian')->default(false);
            $table->boolean('pemerkosaan')->default(false);
            $table->boolean('pembakaran')->default(false);
            $table->boolean('pemeresan')->default(false);
            $table->boolean('pembunuhan')->default(false);
            $table->enum('regency', ['Gayo Lues', 'Pidie Jaya', 'Kota Subulussalam', 'Kota Lhokseumawe', 'Pidie', 'Nagan Raya', 'Simeulue', 'Kota Sabang', 'Aceh Barat', 'Bener Meriah', 'Aceh Besar', 'Aceh Singkil', 'Aceh Tamiang', 'Aceh Barat Daya', 'Aceh Utara', 'Aceh Jaya', 'Aceh Tengah', 'Kota Langsa', 'Aceh Tenggara', 'Aceh Timur', 'Bireuen', 'Kota Banda Aceh', 'Aceh Selatan']); // Replace with actual enum values.
            $table->string('years'); // Using string for varchar2.
            $table->timestamps(); // This will create 'created_at' and 'updated_at' columns.
        });
    }

    public function down()
    {
        Schema::dropIfExists('crime_exist');
    }
};
