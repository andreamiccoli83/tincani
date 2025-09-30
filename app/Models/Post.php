<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Category;
use App\Models\Social;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Post extends Model implements HasMedia
{
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use HasFactory;

    protected $fillable = [
        "title",
        "body",
        "short_body",
        "published_at",
        "enabled",    
        "category_id",    
        "social_id",
        "link",
        "order_column"   
    ];

    protected $dates = [
        "published_at",
        "created_at",
        "updated_at",
    
    ];
    

    protected $appends = ['resource_url'];


    public function getResourceUrlAttribute()
    {
        return url('/admin/posts/'.$this->getKey());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
            ->accepts('image/*');

        $this->addMediaCollection('gallery')
            ->accepts('image/*')
            ->maxNumberOfFiles(20);

        $this->addMediaCollection('pdf')
            ->accepts('application/pdf');
    }

    public function registerMediaConversions(Media $media = null): void
    {

        $this->autoRegisterThumb200();
        
        $this->addMediaConversion('thumb')
              ->width(270);
    }

    

    public function getDateFormattedAttribute() {
        $date = new Carbon($this->published_at);
        $cast =$date->isoFormat('DD MMMM YYYY');
        return $cast;
    }




    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function social()
    {
        return $this->belongsTo(Social::class, 'social_id', 'id');
    }

}
