<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'responsavel',
        'email',
        'nome_evento',
        'local_eventos_id',
        'data',
        'inicio',
        'fim',
        'descricao'
    ];

    public function localEvento()
    {
        return $this->belongsTo(LocalEvento::class, 'local_eventos_id');
    }
}
