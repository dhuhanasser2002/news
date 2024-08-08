<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'feture_img',
        'user_id',
        'category_id',
    ];
    
    public $timestamp = true;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category() { 
        return $this->belongsTo(Category::class); 
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
