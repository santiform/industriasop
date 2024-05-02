<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposPuerta
 *
 * @property $id
 * @property $id_tipo_funcionamiento
 * @property $id_tipo_control
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property TiposControle $tiposControle
 * @property TiposFuncionamiento $tiposFuncionamiento
 * @property Acceso[] $accesos
 * @property DetallesPuerta[] $detallesPuertas
 * @property Pedido[] $pedidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TiposPuerta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_tipo_funcionamiento', 'id_tipo_control', 'nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposControle()
    {
        return $this->belongsTo(\App\Models\TiposControle::class, 'id_tipo_control', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposFuncionamiento()
    {
        return $this->belongsTo(\App\Models\TiposFuncionamiento::class, 'id_tipo_funcionamiento', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accesos()
    {
        return $this->hasMany(\App\Models\Acceso::class, 'id', 'id_tipo_puerta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesPuertas()
    {
        return $this->hasMany(\App\Models\DetallesPuerta::class, 'id', 'id_tipo_puerta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany(\App\Models\Pedido::class, 'id', 'id_tipo_puerta');
    }
    
}
