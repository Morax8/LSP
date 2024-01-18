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
    public static function boot()
    {
        parent::boot();

        // Set the date attribute to the current date when creating a new Tanggapan
        static::creating(function ($tanggapan) {
            $tanggapan->tanggal = now();
        });
    }
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }
}
