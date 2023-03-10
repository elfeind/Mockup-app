<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table  = "pendidikan";

    protected $fillable = [
        'biodata_id',
        'jenjang',
        'nama_institusi',
        'jurusan',
        'tahun_lulus',
        'ipk'
    ];
}
