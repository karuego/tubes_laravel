<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'genre', 'description', 'image', 'release_year',];
    protected $guarded = ['id'];
    // public function tickets()
    // {
    //     return $this->hasMany(Ticket::class);
    // }
}
