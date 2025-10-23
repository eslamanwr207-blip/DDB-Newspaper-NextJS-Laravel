<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use Translatable;

    public $translatedAttributes = ['title', 'description', 'smalDesc', 'tags'];
    protected $fillable = ['id', 'image', 'user_id', 'category_id', 'created_at', 'updated_at', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
