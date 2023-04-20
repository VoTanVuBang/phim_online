<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_Genre extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id','movie_id','genre_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'movie_genre';

   
}