<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'author', 'release_year', 'description', 'page_count', 'language', 'genre_id', 'photo'
    ];


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function readingLists()
    {
        return $this->belongsToMany(ReadingList::class, 'reading_list_books');
    }
}
