<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //


    use HasFactory;
    protected $table = 'stores';
    protected $fillable = [
        'Nombre_Tienda',
        'Direccion',
        'Telefono',
        'slug',
        'Email',
        'Estado_Activo',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
