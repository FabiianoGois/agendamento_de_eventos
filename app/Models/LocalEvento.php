<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalEvento extends Model
{
    use HasFactory;
    protected $fillable = ['local_evento_id'];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'local_eventos_id');
    }
}
