<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatabaseSiswa extends Model
{
    protected $fillable = [
        'namalengkap', 'unit', 'kelas', 'nisn', 'jeniskelamin', 'ttl', 'userid'
    ];

    // Define the relationship between Post and User models
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

