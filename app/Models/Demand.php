<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Demand extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    public function attendances(): BelongsToMany
    {
        return $this->belongsToMany(Attendance::class);
    }
}
