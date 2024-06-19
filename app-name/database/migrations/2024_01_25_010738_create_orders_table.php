<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->set('gry', [
                'fifa24',
                'GranTurismo7',
                'Spider-Man 2',
                'GTA5',
                'The Last of Us',
                'NBA2k24'
            ]);
            $table->string('imie_i_nazwisko');
            $table->string('ulica_i_nr_domu');
            $table->string('kod_pocztowy');
            $table->string('miejscowosc');
            $table->string('telefon');
            $table->string('email');
            $table->enum('platnosc', [
                'Płatność online',
                'Karta płatnicza',
                'BLIK',
                'Przelew tradycyjny'
            ]);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
