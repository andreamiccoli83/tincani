<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;
use Illuminate\Support\Str;




class Single extends Model implements HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;


    protected $fillable = [
        'title',
        'description',
        'info',
        'link_songs',
        'link_spotify',
        'enabled',
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    public function download()
    {
        // Let's get some media.
        $downloads = $this->getMedia('doc');

        // Crea un nome personalizzato per il file zip
        $filename = Str::slug($this->title) . '-media.zip';

        // Download the files associated with the media in a streamed way.
        return MediaStream::create($filename)->addMedia($downloads);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/singles/' . $this->getKey());
    }

    public function registerMediaCollections(): void
    {

        $this->addMediaCollection('singolo')
            ->accepts('image/*');

        $this->addMediaCollection('doc')
            ->acceptsMimeTypes([
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'text/plain',
                'image/jpeg'
                // Aggiungi altri tipi di file supportati
            ])
            ->maxNumberOfFiles(20);
    }

    public function registerMediaConversions(Media $media = null): void
    {

        $this->autoRegisterThumb200();

        $this->addMediaConversion('thumb')
            ->width(270);
    }
}
