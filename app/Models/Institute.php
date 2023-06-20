<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institute extends Model
{
    use HasFactory;

    /**
     * Get institute's students
     *
     * @return HasMany
     */

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
