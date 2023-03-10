<?php

namespace App\Models;

use App\Models\User;
use App\Models\Absen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'tanggal_kegiatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function absens()
    {
        return $this->hasMany(Absen::class);
    }
}