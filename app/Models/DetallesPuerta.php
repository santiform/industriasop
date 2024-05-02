<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetallesPuerta
 *
 * @property $id
 * @property $id_pedido
 * @property $id_tipo_funcionamiento
 * @property $id_tipo_control
 * @property $id_tipo_puerta
 * @property $marca
 * @property $voltaje
 * @property $id_patin_retractil
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido $pedido
 * @property TiposPuerta $tiposPuerta
 * @property TiposFuncionamiento $tiposFuncionamiento
 * @property TiposControle $tiposControle
 * @property TiposPatinRetractil $tiposPatinRetractil
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DetallesPuerta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_pedido', 'id_tipo_funcionamiento', 'id_tipo_control', 'id_tipo_puerta', 'marca', 'voltaje', 'id_patin_retractil'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pedido()
    {
        return $this->belongsTo(\App\Models\Pedido::class, 'id_pedido', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposPuerta()
    {
        return $this->belongsTo(\App\Models\TiposPuerta::class, 'id_tipo_puerta', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposFuncionamiento()
    {
        return $this->belongsTo(\App\Models\TiposFuncionamiento::class, 'id_tipo_funcionamiento', 'id');
    }
    
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
    public function tiposPatinRetractil()
    {
        return $this->belongsTo(\App\Models\TiposPatinRetractil::class, 'id_patin_retractil', 'id');
    }
    
}
