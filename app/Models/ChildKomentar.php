<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildKomentar extends Model
{
    protected $table = 'child_komentar';
    protected $fillable = ['id_komentar', 'child_komentar'];
}
