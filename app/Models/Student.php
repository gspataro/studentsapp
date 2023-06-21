<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    /**
     * Get student institute
     *
     * @return HasOne
     */

    public function institute(): HasOne
    {
        return $this->hasOne(Institute::class, 'id', 'institute_id');
    }

    /**
     * Get student's grades
     *
     * @return HasMany
     */

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
