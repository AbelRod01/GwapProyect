<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Word;

class Word extends Model
{
    protected $fillable=['name','image_id'];
    public function images(){

        return $this->belongsTo(Image::class);
    }
    use HasFactory;
}
