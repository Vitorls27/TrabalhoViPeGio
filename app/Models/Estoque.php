<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    protected $table = "estoque";

    protected $fillable = [
        'nome', 'peso', 'valor', 'quantidade','tipo_id'
    ];

    public function tipo(){
        return $this->belongsTo(Tipo::class,'tipo_id','id');
    }
}
