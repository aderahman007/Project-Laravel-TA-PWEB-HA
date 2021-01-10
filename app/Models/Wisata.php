<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table = 'wisata';
    protected $fillable = ['nama', 'lokasi', 'foto', 'descripsi', 'id_categori', 'id_user'];
}
