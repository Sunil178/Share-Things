<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id', 'name', 'short', 'long', 'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
