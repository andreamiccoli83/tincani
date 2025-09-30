<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $selectedYear = $request->input('year');
        $selectedCategory = $request->input('category');
        $years = [2019, 2020, 2021];
        $categories = Category::all();
        $filteredPosts = [];

        // Verifica se l'utente ha selezionato "Tutti gli anni" e ha fatto clic su "Invia"
        if (!empty($selectedYear) && !empty($selectedCategory)) {
            if ($selectedYear === 'all') {
                $filteredPostsQuery = Post::orderBy('created_at', 'desc');
            } else {
                // Applica il filtro per l'anno selezionato
                $filteredPostsQuery = Post::whereYear('published_at', $selectedYear)
                    ->orderBy('created_at', 'desc');
            }

            // Aggiungi filtro basato sulla categoria, se è stata selezionata
            if ($selectedCategory !== 'all') {
                $filteredPostsQuery->where('category_id', $selectedCategory);
            }

            $filteredPosts = $filteredPostsQuery->get();
        }

        return view('archive.index', compact('selectedYear', 'years', 'categories', 'filteredPosts', 'selectedCategory'));
    }


    public function reset(Request $request){
        return redirect()->route('archive.index');
    }
}
