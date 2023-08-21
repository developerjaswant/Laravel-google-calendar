<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'Page';
    protected $fillable = [
        'number','name', 'image','title1','title2','title3','title3','short_describation','meta_describation','status'];
}