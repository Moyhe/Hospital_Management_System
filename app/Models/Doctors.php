<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctors extends Model
{
    use HasFactory, SoftDeletes;


     protected $fillable = [

         'name',
         'age',
         'gender',
         'image',
         'bio',

     ];

    protected $dates = [

        'deleted_at'
    ];

  /**
     * Get the user that owns the Departments
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Departments::class, 'doctor_id');
    }
}
