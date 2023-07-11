<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalEvento extends Model
{
    use HasFactory;
    protected $fillable = ['local'];
}
