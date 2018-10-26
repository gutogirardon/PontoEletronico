<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Roles extends Model
{
    protected $fillable = [
        'name', 'description', 'role_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
