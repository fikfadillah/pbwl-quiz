<?php

namespace App\Models;

use App\Models\Golongan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model {
    use HasFactory;

    protected $table = 'pelanggans';

    protected $fillable = [
        'pel_no',
        'pel_id_gol',
        'pel_nama',
        'pel_alamat',
        'pel_hp',
        'pel_ktp',
        'pel_seri',
        'pel_meteran',
        'pel_aktif',
        'pel_id_user'
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'pel_id_gol', 'id');
    }

    public static function generateKodePel()
    {
        $plg     = Pelanggan::latest()->first();
        $kodePlg = 'PLG';

        if ($plg == null) {
            $noUrut = '001';
        } else {
            $explode = explode('-', $plg->pel_no);
            $noUrut  = $explode[1] + 1;
            $noUrut  = str_pad($noUrut, 3, "0", STR_PAD_LEFT);
        }

        $plgKode = $kodePlg . '-' . $noUrut;

        return $plgKode;
    }

    public static function generateNoSeri()
    {
        $kode = '';

        for ($i = 1; $i < 16; $i++) {
            $kode .= mt_rand(0, 9);
        }

        return $kode;
    }

    public static function generateNoMeteran()
    {
        $kode = '';

        for ($i = 1; $i < 10; $i++) {
            $kode .= mt_rand(0, 9);
        }

        return $kode;
    }

}
