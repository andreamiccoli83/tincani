<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;


class Profile extends Model implements HasMedia
{
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;


    protected $fillable = [
        'bio',
    ];
    
    protected $dates = [
        'created_at',
        'updated_at', 
    ];

    protected $appends = ['resource_url'];


        /* ************************ ACCESSOR ************************* */

        public function getResourceUrlAttribute()
        {
            return url('/admin/profiles/'.$this->getKey());
        }
    
        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('foto_bio')
                ->accepts('image/*');
        }
    
        public function registerMediaConversions(Media $media = null): void
        {
            $this->autoRegisterThumb200();
        }
    

}
