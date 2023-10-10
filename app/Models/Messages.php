<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;


    protected $fillable = [

        'name',
        'phone',
        'email',
        'message',
        'user_id'
    ];


    /**
     * Get the user that owns the Messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
