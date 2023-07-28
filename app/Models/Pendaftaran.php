<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_pasien';

    protected $fillable = [
        'no_registrasi',
        'id_pasien'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pasien', 'id');
    }

    public static function booted(){

        static::creating(function($model)
        {
            $model->id_pasien = auth()->id();
        });
    }

    protected static function boot()
{
    parent::boot();

    static::creating(function ($noRegis) {
        $latestPendaftaran = static::orderBy('id', 'desc')->first();
        if ($latestPendaftaran) {
            $lastCode = intval(substr($latestPendaftaran->no_registrasi, 1));
            $kodeRegis = 'R' . str_pad($lastCode + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $kodeRegis = 'R001';
        }
        $noRegis->no_registrasi = $kodeRegis;
    });

    static::deleting(function ($noRegis) {
        $deletedCode = $noRegis->no_registrasi;
        $nextRegis = static::where('no_registrasi', '>', $deletedCode)->first();
        if ($nextRegis) {
            $kodeRegis = 'R ' . str_pad(substr($nextRegis->no_registrasi, 1), 3, '0', STR_PAD_LEFT);
            $nextRegis->no_registrasi = $deletedCode;
            $nextRegis->save();
        }
    });
}
}
