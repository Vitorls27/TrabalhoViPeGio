<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitura extends Model
{
    use HasFactory;

    protected $table = "leitura";

    protected $fillable = [
        'data_leitura', 'hora_leitura', 'valor_sensor', 'sensor_id', 'mac_id'
    ];

    public function mac(){
        return $this->belongsTo(Mac::class,'mac_id','id');
    }
    public function sensor(){
        return $this->belongsTo(Sensor::class,'sensor_id','id');
    }

    public function getDataLeituraAttribute($value){
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }/*
    public function setDataLeituraAttribute($value){
        $this->attributes['data_leitura'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }*/
}
