<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'id','rating','movie_id','ip_address'
    ];
    protected $primaryKey = 'id';
    protected $table = 'rating';
}