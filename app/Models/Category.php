<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'status',
        'description',
        'slug',
    ];

    public function getPhotoAttribute($value)
    {
        return $value !== null ? asset('images/category/'.$value) : '';
    }

    public function getStatus(){
        return $this->status == 0 ? 'غير مفعل' : 'مفعل' ;
    }

}
