<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lawyer
 *
 * @property $id
 * @property $name
 * @property $specialization
 * @property $created_at
 * @property $updated_at
 *
 * @property Legal[] $legals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lawyer extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'specialization'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function legals()
    {
        return $this->hasMany(\App\Models\Legal::class, 'id', 'lawyer_id');
    }
    
}
