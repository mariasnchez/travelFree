<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = "idUsu";

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function unoamuchos(){
        return $this->hasMany('App\Models\Destino','id','idUsu');
      }

    public function hotel()
    {
        return $this->belongsToMany('App\Models\Hotel', 'hotel_visitado', 'idUsu',      'idHotel')
                    ->withPivot('fechaEntrada', 'fechaSalida', 'punUbi', 'punLim', 'punSer', 'punCalPre', 'comentario', 'idUsu', 'idHotel');
    }

    public function restaurante()
    {
        return $this->belongsToMany('App\Models\Restaurante', 'restaurante_visitado', 'idUsu', 'idRes')
                    ->withPivot('fechaVisita', 'punCom', 'punSer', 'punCalPre', 'comentario', 'idUsu', 'idRes');
    }
}
