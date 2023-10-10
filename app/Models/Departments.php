<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departments extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'name',
        'description',
        'image',
        'doctor_id'

    ];

    protected $dates = [

        'deleted_at'
    ];



     /**
     * Get all of the comments for the Doctors
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctors(): HasMany
    {
        return $this->hasMany(Doctors::class);
    }

}
