<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Legal
 *
 * @property $id
 * @property $commitments
 * @property $deadline
 * @property $lawyer_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Lawyer $lawyer
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Legal extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['commitments', 'deadline', 'lawyer_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lawyer()
    {
        return $this->belongsTo(\App\Models\Lawyer::class, 'lawyer_id', 'id');
    }
    
}
