<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';

    protected $fillable = [
        'id_pendaftaran',
        'gejala',
        'diagnosis',
        'solusi',
        'id_pasien',
        'id_dokter'
    ];

    // public function dokter()
    // {
    //     return $this->belongsTo(User::class, 'id_dokter', 'id');
    // }

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien', 'id');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id');
    }

    public static function booted(){

        static::creating(function($model)
        {
            $model->id_dokter = auth()->id();
        });
    }
}
