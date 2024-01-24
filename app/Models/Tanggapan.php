<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengaduan_id',
        'tanggal',
        'isi',
    ];
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($tanggapan) {
            $tanggapan->tanggal = now();
        });
    }
}
