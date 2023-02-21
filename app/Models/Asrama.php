<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asrama extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
}
