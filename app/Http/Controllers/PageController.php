<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Book;
use App\Models\Profile;
use App\Models\Single;

class PageController extends Controller
{
    public function homepage()
    {
        $news = Post::with(['social'])->whereHas('category', function ($query) {
            $query->where('category', 'NEWS');
        })->where('enabled', true)->orderBy('order_column', 'desc')->take(4)->skip(1)->get();

        $evidence = Post::whereHas('category', function ($query) {
            $query->where('category', 'NEWS');
        })->where('enabled', true)->orderBy('order_column', 'desc')->first();

        $events = Post::whereHas('category', function ($query) {
            $query->where('category', 'EVENTS');
        })->where('enabled', true)->orderBy('order_column', 'desc')->take(4)->get();

        $edo = Post::whereHas('category', function ($query) {
            $query->where('category', 'EDOTORIALE');
        })->where('enabled', true)->orderBy('order_column', 'desc')->take(4)->get();

        $books = Book::orderBy('anno', 'desc')->get();

        $singles = Single::where('enabled', true)->orderBy('created_at','desc')->get();

        return view('index', ['evidence'=> $evidence, 'news' => $news, 'events' => $events,  'edo' => $edo, 'books'=> $books, 'singles'=> $singles]);
    }

    public function postDetails($id)
    {
        // Trova il post con l'id fornito
        $details = Post::find($id);

        // Ottieni la categoria del post
        $category = $details->category;

        // Ottieni gli ultimi 6 post della stessa categoria
        $relatedPosts = Post::where('category_id', $category->id)
            ->where('id', '<>', $id)// Escludi il post attuale
            ->where('enabled', true) 
            ->latest()
            ->take(6)
            ->get();

        return view('details', [
            'details' => $details,
            'category' => $category,
            'relatedPosts' => $relatedPosts,
        ]);
    }
    public function showPosts(Request $request)
    {
        $routeName = $request->route()->getName();

        $categoryName= strtoupper($routeName);

        $category = Category::where('category', $categoryName)->first();

        

        $allPosts = Post::where('category_id', $category->id)
        ->whereDate('published_at', '>=', '2022-01-01')
        ->where('enabled', true)
        ->orderBy('created_at', 'desc')
        ->get();

        $relatedPosts = Post::where('category_id', $category->id)
        ->where('enabled', true)
        ->latest()
        ->take(6)
        ->get();

        return view('posts', ['allPosts' => $allPosts, 'relatedPosts' => $relatedPosts,]);
    }

    public function libriPage()
    {
        $books = Book::orderBy('id', 'desc')->get();

        return view('libri', compact('books'));
    }
    public function bookDetails($id)
    {
        $details = Book::find($id);

        return view('libri-details', compact('details'));
    }

    public function download(Request $request, Book $book)
    {
         // Chiamare la funzione download del modello Book
         $download = $book->download($book);

         // Restituire il risultato del download
         return $download;
    }
    public function downloadSingle(Request $request, Single $single)
    {
         // Chiamare la funzione download del modello Book
         $download = $single->download($single);

         // Restituire il risultato del download
         return $download;
    }

    public function musicaPage()
    {
        return view('musica');
    }

    public function unCanto()
    {
        return view('musica/due-voci-un-canto', ['page' => 'due-voci-un-canto', 'title' => '', 'description' => '', 'canonical' => route('un-canto')]);
    }
    public function diViaggio()
    {
        return view('musica/compagni-di-viaggio', ['page' => 'compagni-di-viaggio', 'title' => '', 'description' => '', 'canonical' => route('di-viaggio')]);
    }
    public function aedo()
    {
        return view('musica/aedo', ['page' => 'aedo', 'title' => '', 'description' => '', 'canonical' => route('aedo')]);
    }

    public function vengaRegno()
    {
        return view('musica/venga-regno', ['page' => 'venga-regno', 'title' => '', 'description' => '', 'canonical' => route('venga-regno')]);
    }

    public function cronacaRegno()
    {
        return view('musica/cd/cronaca-regno', ['page' => 'cronaca-regno', 'title' => '', 'description' => '', 'canonical' => route('cronaca-regno')]);
    }

    public function presentazione()
    {
        return view('musica/cd/presentazione', ['page' => 'presentazione', 'title' => '', 'description' => '', 'canonical' => route('presentazione')]);
    }

    public function tiCerchero()
    {
        return view('musica/ti-cerchero', ['page' => 'ti-cerchero', 'title' => '', 'description' => '', 'canonical' => route('ti-cerchero')]);
    }

    public function concerto()
    {
        return view('musica/cd/concerto', ['page' => 'concerto', 'title' => '', 'description' => '', 'canonical' => route('concerto')]);
    }

    public function tiCanto()
    {
        return view('musica/e-con-questa-vita', ['page' => 'ti-canto', 'title' => '', 'description' => '', 'canonical' => route('ti-canto')]);
    }
    public function tiCantoProgetto()
    {
        return view('musica/progetto-io-ti-canto', ['page' => 'ti-canto-progetto', 'title' => '', 'description' => '', 'canonical' => route('ti-canto-progetto')]);
    }

    public function loSguardo()
    {
        return view('musica/lo-sguardo', ['page' => 'lo-sguardo', 'title' => '', 'description' => '', 'canonical' => route('lo-sguardo')]);
    }


    public function contactsPage()
    {
        return view('contacts');
    }
    public function aboutPage()
    {

        $about = Profile::first();

        return view('about', ['about' => $about]);
    }
    public function singlePage()
    {

        $singles = Single::where('enabled', true)->orderBy('created_at','desc')->get();

        return view('single', ['singles' => $singles]);
    }

    public function singleDetails($id)
    {
        // Trova il post con l'id fornito
        $details = Single::find($id);


        return view('single-details', [
            'details' => $details,
        ]);
    }
}
