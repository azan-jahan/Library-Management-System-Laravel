<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'category', 'year'];

    public function issuedBooks(): HasMany
    {
        return $this->hasMany(IssuedBook::class);
    }
}
