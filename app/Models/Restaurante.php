<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;

    protected $table = "restaurante";

    protected $primaryKey = "idRes";

    static $rules = [
    
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
        'tipoCocina' => 'required',
        'descripcion' => 'required',
        'precio' => 'required',
        'valoracion' => 'required',
		'valCom' => 'required',
		'valSer' => 'required',
        'valCalPre' => 'required',
		'foto1' => 'required',
        'foto2' => 'nullable',
		'foto3' => 'nullable',
		'foto4' => 'nullable',
        'foto5' => 'nullable',
        'foto6' => 'nullable',
        'idCiudad' => 'required', 
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre', 'direccion', 'descripcion', 'valoracion', 'valCom', 'valSer', 'valCalPre', 'foto1', 'foto2', 'foto3', 'foto4', 'foto5', 'foto6', 'idCiudad'];

    public function ciudad(){
        return $this->belongsTo('App\Models\Ciudad', 'idHotel', 'idCiudad');
    }

    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'restaurante_visitado', 'idRes', 'idUsu')
                    ->withPivot('fechaVisita', 'punCom', 'punSer', 'punCalPre', 'comentario', 'idUsu', 'idRes');
    }

}
