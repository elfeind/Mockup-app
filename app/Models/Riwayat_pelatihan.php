<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Riwayat_pelatihan extends Model
{
    use HasFactory;

    protected $table  = "riwayat_pelatihan";

    protected $fillable = [
        'biodata_id',
        'nama_pelatihan',
        'sertifikat',
        'tahun'
    ];
}
