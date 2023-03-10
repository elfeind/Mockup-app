<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Biodata extends Model
{
    use HasFactory;

    protected $table  = "biodata";

    protected $fillable = [
        'user_id',
        'posisi_lamaran',
        'nama',
        'no_ktp',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'golongan_darah',
        'status',
        'alamat_ktp',
        'alamat_tinggal',
        'email',
        'no_tlp',
        'orang_terdekat',
        'skill',
        'bersedia_ditempatkan',
        'penghasilan_harapan',
    ];
}
