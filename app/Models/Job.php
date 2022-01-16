<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // auth()->user()->likes->contains('id', $this->id); : permet de comparer $this->id cad l'id du job qui a été cliqué aux id des job qui sont dans la collection. cela renvoie vraie ou faux 

    //scopeOline recuper les jobs dont status = 1
    public function scopeOnline($query)
    {
        # code...
        return $query->where('status', 1);
    }

    public function user()
    {
        # code...
        return $this->belongsTo('App\Models\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function isLiked()
    {
        if (auth()->check()) 
        {
            return auth()->user()->likes->contains('id', $this->id);
        } 
    }




}
