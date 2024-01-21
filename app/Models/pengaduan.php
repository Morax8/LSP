<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tujuan;

class pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        'tujuan_id',
        'name',
        'email',
        'telpon',
        'alamat',
        'tanggal',
        'isi',
        'gambar',
        'active',
    ];
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('id', $search);
        });
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class);
    }

    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class);
    }
}
