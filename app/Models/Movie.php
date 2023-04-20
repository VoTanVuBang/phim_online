<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'id','title','description','status','image','category_id','genre_id','country_id','slug','name_eng','phim_hot','resolution','phude'
    ];
    protected $primaryKey = 'id';
    protected $table = 'movies';


    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
        
    }   
    public function genre(){
        return $this->belongsTo(Genre::class,'genre_id');
    }

    public function movie_genre(){
        return $this->belongsToMany(Genre::class,'movie_genre','movie_id','genre_id');
    }

    public function episode(){
        return $this->hasMany(Episode::class);
    }

}