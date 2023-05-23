<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = "funcionario";

    protected $fillable = [
        'nome', 'telefone', 'email', 'setor_id', 'imgfun'
    ];

    public function setor(){
        return $this->belongsTo(Setor::class,'setor_id','id');
    }
}
