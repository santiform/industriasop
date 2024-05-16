<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposControle
 *
 * @property $id
 * @property $id_tipo_funcionamiento
 * @property $nombre
 * @property $marca
 * @property $voltaje
 * @property $potencia
 * @property $encoder
 * @property $rescate
 * @property $created_at
 * @property $updated_at
 *
 * @property TiposFuncionamiento $tiposFuncionamiento
 * @property Acceso[] $accesos
 * @property DetallesPuerta[] $detallesPuertas
 * @property Pedido[] $pedidos
 * @property TiposPuerta[] $tiposPuertas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TiposControle extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_tipo_funcionamiento', 'nombre'];


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
        return $this->hasMany(\App\Models\Acceso::class, 'id', 'id_tipo_control');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesPuertas()
    {
        return $this->hasMany(\App\Models\DetallesPuerta::class, 'id', 'id_tipo_control');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany(\App\Models\Pedido::class, 'id', 'id_tipo_control');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tiposPuertas()
    {
        return $this->hasMany(\App\Models\TiposPuerta::class, 'id', 'id_tipo_control');
    }
    
}
