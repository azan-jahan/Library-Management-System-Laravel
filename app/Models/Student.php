<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = ['name', 'roll_no', 'class', 'contact'];

    public function issuedBooks(): HasMany
    {
        return $this->hasMany(IssuedBook::class);
    }
}
