<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
class Image extends Model
{
    protected $fillable=['name','imagen_id'];
    public function words(){

        return $this->hasMany(Word::class);
    }

    use HasFactory;
}
