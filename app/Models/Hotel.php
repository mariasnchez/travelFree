<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = "hotel";

    protected $primaryKey = "idHotel";

    static $rules = [
        "nombre" => "required",
        "direccion" => "required",
        "descripcion" => "required",
        "valoracion" => "required",
        "valUbi" => "required",
        "valLim" => "required",
        "valSer" => "required",
        "valCalPre" => "required",
        "foto1" => "required",
        "foto2" => "nullable",
        "foto3" => "nullable",
        "foto4" => "nullable",
        "foto5" => "nullable",
        "foto6" => "nullable",
        "idCiudad" => "required",
    ];

    protected $perPage = 20;

    protected $fillable = [
        "nombre",
        "direccion",
        "descripcion",
        "valoracion",
        "valUbi",
        "valLim",
        "valSer",
        "valCalPre",
        "foto1",
        "foto2",
        "foto3",
        "foto4",
        "foto5",
        "foto6",
        "idCiudad",
    ];
    public function ciudad()
    {
        return $this->belongsTo("App\Models\Ciudad", "idCiudad", "idCiudad");
    }

    public function ofertas()
    {
        return $this->hasMany("App\Models\Oferta", "idOferta", "idHotel");
    }

    public function usuario()
    {
        return $this->belongsToMany(
            "App\Models\User",
            "hotel_visitado",
            "idHotel",
            "idUsu"
        )->withPivot(
            "fechaEntrada",
            "fechaSalida",
            "punUbi",
            "punLim",
            "punSer",
            "punCalPre",
            "comentario",
            "idUsu",
            "idHotel"
        );
    }
}
