<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pemesanan', 100)->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama_pemesan', 100);
            $table->string('email_pemesan', 100);
            $table->string('nomor_handphone', 20);
            $table->text('alamat_pengiriman');
            $table->text('catatan_pemesan')->nullable();
            $table->decimal('total_harga_produk', 15, 2);
            $table->decimal('biaya_pengiriman', 10, 2)->default(0.00);
            $table->decimal('diskon', 15, 2)->default(0.00);
            $table->decimal('total_bayar', 15, 2);
            $table->string('status_pesanan', 50);
            $table->string('status_pembayaran', 50);
            $table->string('metode_pembayaran', 100)->nullable();
            $table->string('midtrans_transaction_id', 100)->nullable();
            $table->string('midtrans_payment_type', 50)->nullable();
            $table->string('midtrans_va_number', 100)->nullable();
            $table->text('midtrans_snap_token')->nullable();
            $table->timestamp('tanggal_pesan')->useCurrent();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_pemesanan');
    }
};
