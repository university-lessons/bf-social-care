<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Demand extends Model
{
    protected $fillable = [
        'description'
    ];

    public function attendances(): BelongsToMany
    {
        return $this->belongsToMany(Attendance::class);
    }
}
