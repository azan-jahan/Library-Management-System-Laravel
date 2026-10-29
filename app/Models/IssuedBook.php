<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssuedBook extends Model
{
    protected $fillable = ['student_id', 'book_id', 'issue_date', 'return_date', 'status'];

    protected $casts = [
        'issue_date' => 'date',
        'return_date' => 'date',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
