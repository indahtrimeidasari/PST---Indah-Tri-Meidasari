<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_detail_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id');
            $table->unsignedBigInteger('produk_id'); // harus sama tipe dengan tb_produk.id_produk
            $table->string('nama_produk_saat_pesan', 255);
            $table->integer('kuantitas')->unsigned();
            $table->decimal('harga_satuan_saat_pesan', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->timestamps();

            $table->foreign('pemesanan_id')->references('id')->on('tb_pemesanan')->onDelete('cascade');
            $table->foreign('produk_id')->references('id_produk')->on('tb_produk')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_detail_pemesanan');
    }
};
