<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    use HasFactory;
    protected $table = 'ekstrakulikuler';

    protected $fillable = ['nama'];

    public function getNamaAttribute($value)
    {
        return strtoupper($value);
    }

    public function setNamaAttribute($value) {
        $this->attributes['nama'] = strtolower($value);
    }

    public function user() {
        return $this->hasMany('App\Models\User');
    }
}