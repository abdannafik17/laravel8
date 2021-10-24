<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'nisn', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin'
    ];

    public function telepon()
    {
        return $this->hasOne('App\Models\Telepon', 'id_siswa');
    }
}
