<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warga extends Model
{
    use HasFactory;
    protected $fillable = ['nama','alamat', 'no_hp', 'tanggal_lahir', 'status', 'agama'];
    protected $table = 'warga';
    public $timestamps = false;

}
