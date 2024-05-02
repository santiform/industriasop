<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposPatinRetractile
 *
 * @property $id
 * @property $tipo
 * @property $voltaje
 * @property $created_at
 * @property $updated_at
 *
 * @property DetallesPuerta[] $detallesPuertas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TiposPatinRetractile extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['tipo', 'voltaje'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesPuertas()
    {
        return $this->hasMany(\App\Models\DetallesPuerta::class, 'id', 'id_patin_retractil');
    }
    
}
