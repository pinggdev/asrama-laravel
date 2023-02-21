<?php

namespace App\Models;

use App\Models\User;
use App\Models\Asrama;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function asrama()
    {
        return $this->belongsTo(Asrama::class);
    }
}
