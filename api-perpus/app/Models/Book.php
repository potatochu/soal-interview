<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_user')->withTimestamps()->withPivot('borrow_date', 'return_date');
    }

    public function getIsAvailableAttribute()
    {
        return $this->users()->whereNull('return_date')->doesntExist();
    }
}
