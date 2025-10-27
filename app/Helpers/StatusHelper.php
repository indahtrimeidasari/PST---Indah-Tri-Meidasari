<?php

namespace App\Helpers;

class StatusHelper
{
    public static function getPesananStatusClass($status)
    {
        switch (strtolower($status)) {
            case 'menunggu pembayaran':
                return 'status-badge-menunggu';
            case 'verifikasi pembayaran':
                return 'status-badge-verifikasi';
            case 'diproses':
                return 'status-badge-diproses';
            case 'dikirim':
                return 'status-badge-dikirim';
            case 'selesai':
                return 'status-badge-selesai';
            case 'dibatalkan':
                return 'status-badge-dibatalkan';
            default:
                return 'status-badge-default';
        }
    }

    public static function getPembayaranStatusClass($status)
    {
        $status = strtolower($status);
        if (str_contains($status, 'lunas')) {
            return 'status-badge-lunas';
        } elseif (str_contains($status, 'pending') || str_contains($status, 'menunggu pembayaran')) {
            return 'status-badge-menunggu';
        } elseif (str_contains($status, 'menunggu konfirmasi')) {
            return 'status-badge-menunggu-konfirmasi';
        } elseif (str_contains($status, 'sukses')) {
            return 'status-badge-verifikasi';
        } elseif (str_contains($status, 'ditolak')) {
            return 'status-badge-ditolak';
        } elseif (str_contains($status, 'gagal') || str_contains($status, 'kadaluarsa') || str_contains($status, 'dibatalkan')) {
            return 'status-badge-gagal';
        } else {
            return 'status-badge-default';
        }
    }
}
