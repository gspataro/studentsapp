<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Grade extends Model
{
    use HasFactory;

    /**
     * Get grade student
     *
     * @return HasOne
     */

    public function student(): HasOne
    {
        return $this->hasOne(Institute::class, 'id', 'student_id');
    }
}
