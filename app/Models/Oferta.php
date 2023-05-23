<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;
    
    protected $table = "oferta";

    protected $primaryKey = "idOferta";

    static $rules = [
		'precioOferta' => 'required',
		'fechaFin' => 'required',
		'idHotel' => 'required', 
    ];

    protected $perPage = 20;

    protected $fillable = ['precioOferta', 'fechaFin', 'idHotel'];

    public function hotel(){
        return $this->belongsTo('App\Models\Hotel', 'idOferta', 'idHotel');
    }

}
