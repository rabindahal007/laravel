<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =[
        'Book_Name',
        'Description',
        'Book_Link',
        'Category',
        'image'
        

    ];
}
