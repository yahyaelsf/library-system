<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function getVisibleStatusAttribute(){
        return $this->is_visible ? 'visible' : 'hidden';
    }
    public function books(){
        return $this->hasMany(Book::class,'category_id','id');
    }
}
