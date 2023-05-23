<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestauranteVisitado extends Model
{
    use HasFactory;

    protected $table = "restaurante_visitado";

    protected $primaryKey = "idResVis";

    static $rules = [
		'fechaVisita' => 'required',
		'punCom' => 'required', 
		'punSer' => 'required', 
		'punCalPre' => 'required', 
        'comentario' => 'required', 
        'idUsu' => 'required', 
        'idRes' => 'required', 
    ];

    protected $perPage = 20;

    protected $fillable = ['fechaVisita', 'punCom', 'punSer', 'punCalPre', 'comentario', 'idUsu', 'idRes'];

    public function restaurante()
    {
        return $this->belongsTo('App\Models\Restaurante', 'idRes', 'idRes');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'idUsu', 'idUsu');
    }
}
