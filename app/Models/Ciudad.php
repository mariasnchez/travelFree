<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = "ciudad";

    protected $primaryKey = "idCiudad";

    static $rules = [
    
		'nombre' => 'required',
		'pais' => 'required',
		'descripcion' => 'required',
		'foto1' => 'required',
        'foto2' => 'nullable',
		'foto3' => 'nullable',
		'foto4' => 'nullable',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre', 'pais', 'descripcion', 'foto1', 'foto2', 'foto3', 'foto4'];


    public function hotel()
    {
        return $this->hasMany('App\Models\Hotel', 'idCiudad', 'idCiudad');
    }


    public function restaurante(){
        return $this->hasMany('App\Models\Restaurante','idCiudad','idCiudad');

    }
}
