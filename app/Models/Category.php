<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "category",
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/categories/'.$this->getKey());
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
