<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Riwayat_pekerjaan extends Model
{
    use HasFactory;

    protected $table  = "riwayat_pekerjaan";

    protected $fillable = [
        'biodata_id',
        'nama_perusahaan',
        'posisi_terakhir',
        'pendapatan_terakhir',
        'tahun'
    ];
}
