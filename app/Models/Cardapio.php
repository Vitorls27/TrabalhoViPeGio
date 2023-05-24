<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    use HasFactory;
    protected $table = "cardapio";

    protected $fillable = [
        'nome', 'valor', 'tipo_id', 'descriçao', 'imgprod'
    ];

    public function tipo(){
        return $this->belongsTo(Tipo::class,'tipo_id','id');
    }
}
