<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Destino
 *
 * @property $id
 * @property $ciudad
 * @property $hotel
 * @property $noches
 * @property $valoracion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Destino extends Model
{
  use HasFactory;

  protected $table = "destinos";
    
    static $rules = [
    
		'ciudad' => 'required',
		'hotel' => 'required',
		'noches' => 'required',
		'valoracion' => 'required',
    'idUsu' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ciudad','hotel','noches','valoracion','idUsu'];


    public function muchosauno(){
      return $this->belongsTo('App\Models\User', 'id', 'idUsu');
    }
}

