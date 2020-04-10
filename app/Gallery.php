<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = [
        'aidkey', 'title', 'size', 'category', 'artistNotes', 'price', 'photo_id', 'file'
    ];

}
