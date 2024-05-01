<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Acceso
 *
 * @property $id
 * @property $id_tipo_funcionamiento
 * @property $id_tipo_control
 * @property $id_tipo_puerta
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property TiposControl $tiposControl
 * @property TiposPuertum $tiposPuertum
 * @property TiposFuncionamiento $tiposFuncionamiento
 * @property Pedido[] $pedidos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Acceso extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_tipo_funcionamiento', 'id_tipo_control', 'id_tipo_puerta', 'nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposControl()
    {
        return $this->belongsTo(\App\Models\TiposControl::class, 'id_tipo_control', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposPuertum()
    {
        return $this->belongsTo(\App\Models\TiposPuertum::class, 'id_tipo_puerta', 'id');
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
    public function pedidos()
    {
        return $this->hasMany(\App\Models\Pedido::class, 'id', 'id_acceso');
    }
    
}
