<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Carbon\Carbon;
use Spatie\MediaLibrary\Support\MediaStream;



class Book extends Model implements HasMedia
{
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;



    protected $fillable = [
        'title',
        'author',
        'coauthor',
        'editore',
        'anno',
        'link',
        'link_two',
        'link_three',
        'description',
    ];


    protected $dates = [
        'anno',
        'created_at',
        'updated_at',
    ];


    protected $appends = ['resource_url'];

    public function getDateFormattedAttribute()
    {
        $date = new Carbon($this->anno);
        $cast = $date->isoFormat('YYYY');
        return $cast;
    }

    public function download(Book $book)
    {
        // Let's get some media.
        $downloads = $book->getMedia('doc');

        //dd($downloads);

        // Download the files associated with the media in a streamed way.
        // No prob if your files are very large.
        return MediaStream::create('media_book.zip')->addMedia($downloads);
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/books/' . $this->getKey());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('copertina')
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
    }
}
