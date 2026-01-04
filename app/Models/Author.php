<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Author extends Model
{
    protected $fillable = ['name', 'country'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
