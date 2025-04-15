<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'close_relative',
        'close_relative_degree',
        'birthdate',
        'cpf',
        'rg',
        'birthplace',
        'address',
        'religion',
        'color',
        'income',
        'chemical_dependency',
        'crime_article',
        'crime_status',
        'family_telephone',
        'family_address',
    ];

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
