<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // Ruta de las imagenes
    protected $uploads = '/images/';

    // Campos del modelo 'Photo'
    protected $fillable = ['file'];

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }

    public function photoPlaceholder($photo){
        return "http://placehol.it/700X200";
    }
}
