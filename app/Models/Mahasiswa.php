<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas' ;
    protected $primaryKey = 'npm';

    public $incrementing = false ;
    public $timestamps = true ;
}
