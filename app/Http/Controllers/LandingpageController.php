<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;

class LandingpageController extends Controller
{
    // index function
    public function index()
    {
        // Récupérer la langue de l'utilisateur
        $locale = app()->getLocale();
        $nameColumn = 'name_' . $locale;

        // Récupérer les 4 premières catégories traduites
        $categories = Category::select('id', $nameColumn . ' as name', 'image')
                                ->take(4)
                                ->get();

        // Récupérer le reste des catégories pour "Voir plus"
        $moreCategories = Category::select('id', $nameColumn . ' as name', 'image')
                                    ->skip(4)
                                    ->take(20)
                                    ->get();

        return view('Landing', compact('categories', 'moreCategories'));
    }

    public function search(Request $request)
    {
        // Récupérer la langue actuelle
        $locale = app()->getLocale();
        $nameColumn = 'name_' . $locale;
    
        // Obtenir la valeur de recherche
        $search = $request->input('search');
    
        // Rechercher les catégories qui contiennent le terme de recherche dans leur nom
        $categories = Category::where($nameColumn, 'like', '%' . $search . '%')
                              ->select('id', $nameColumn . ' as name', 'image')
                              ->get();
    
        // Initialisation des variables
        if ($categories->isEmpty()) {
            $message = __('messages.no_results_found'); // Message si aucune catégorie n'est trouvée
            $categoriesFirst = collect();  // Initialisation avec une collection vide
            $moreCategories = collect();  // Initialisation avec une collection vide
        } else {
            $message = '';  // Message vide si des catégories sont trouvées
            $categoriesFirst = $categories->take(4);
            $moreCategories = $categories->skip(4)->take(20);
        }
    
        return view('Landing', compact('categoriesFirst', 'moreCategories', 'search', 'message'));
    }
    public function show($id)
{
    $category = Category::findOrFail($id);
    $services = Service::where('category_id', $id)->get();

    return view('categories.show', compact('category', 'services'));
}
}
