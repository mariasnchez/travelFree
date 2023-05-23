<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelVisitado extends Model
{
    use HasFactory;

    protected $table = "hotel_visitado";

    protected $primaryKey = "idHotVis";

    static $rules = [
		'fechaEntrada' => 'required',
		'fechaSalida' => 'required',
		'punUbi' => 'required', 
        'punLim' => 'required', 
		'punSer' => 'required', 
		'punCalPre' => 'required', 
        'comentario' => 'required', 
        'idUsu' => 'required', 
        'idHotel' => 'required', 
    ];

    protected $perPage = 20;

    protected $fillable = ['fechaEntrada', 'fechaSalida', 'punUbi', 'punLim', 'punSer', 'punCalPre', 'comentario', 'idUsu', 'idHotel'];

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'idHotel', 'idHotel');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Models\User', 'idUsu', 'idUsu');
    }

}
