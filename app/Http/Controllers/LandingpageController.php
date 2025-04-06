<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttractionCategory;
use App\Models\ShoppingCategory;
use App\Models\CircuitCategory;
use App\Models\HebergementCategory;
use App\Models\RestaurantsCategory;
use App\Models\TransportsCategory;
use App\Models\GuidesCategory;
use App\Models\HôpitauxCategory;
use App\Models\PharmaciesCategory;
use App\Models\SupermarchésCategory;
use App\Models\CommissariatsCategory;
use App\Models\AttractionService;

class LandingpageController extends Controller
{
    // Fonction index
    public function index()
    {
        $locale = app()->getLocale();
        $nameColumn = 'name_' . $locale;
    
        // Définir les catégories principales et leurs limites
        $primaryCategories = [
            AttractionCategory::class,
            ShoppingCategory::class,
            CircuitCategory::class,
            HebergementCategory::class,
        ];
    
        $secondaryCategories = [
            RestaurantsCategory::class,
            TransportsCategory::class,
            GuidesCategory::class,
            SupermarchésCategory::class,
            HôpitauxCategory::class,
            PharmaciesCategory::class,
            CommissariatsCategory::class,
        ];
    
        // Récupérer les 4 premières catégories principales
        $categories = collect();
        foreach ($primaryCategories as $categoryClass) {
            $categories = $categories->merge($categoryClass::select('id', $nameColumn . ' as name', 'image')->take(1)->get());
        }
    
        // Récupérer plus de catégories pour "Voir plus"
        $moreCategories = collect();
        foreach ($secondaryCategories as $categoryClass) {
            $moreCategories = $moreCategories->merge($categoryClass::select('id', $nameColumn . ' as name', 'image')->take(2)->get());
        }
    
        return view('Landing', compact('categories', 'moreCategories'));
    }

    // Fonction de recherche
    public function search(Request $request)
    {
        $locale = app()->getLocale();
        $nameColumn = 'name_' . $locale;
        $search = $request->input('search');

        // Rechercher dans chaque table et fusionner les résultats
        $categories = collect()
            ->merge(AttractionCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get())
            ->merge(ShoppingCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get())
            ->merge(CircuitCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get())
            ->merge(HebergementCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get())
            ->merge(RestaurantsCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get())
            ->merge(TransportsCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get())
            ->merge(GuidesCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get())
            ->merge(SupermarchésCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get())
            ->merge(HôpitauxCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get())
            ->merge(PharmaciesCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get())
            ->merge(CommissariatsCategory::where($nameColumn, 'like', '%' . $search . '%')->select('id', $nameColumn . ' as name', 'image')->get());

        // Séparer les résultats en deux groupes
        if ($categories->isEmpty()) {
            $message = __('messages.no_results_found');
            $categoriesFirst = collect();
            $moreCategories = collect();
        } else {
            $message = '';
            $categoriesFirst = $categories->take(4);
            $moreCategories = $categories->skip(4)->take(20);
        }

        return view('Landing', compact('categoriesFirst', 'moreCategories', 'search', 'message'));
    }

    // Fonction pour afficher les services d'une catégorie
    public function show($id)
    {
        $category = AttractionCategory::with('services')->findOrFail($id);
        return view('categories.showattraction', compact('category'));
    }
    
    //Fonction pour afficher details d'un service
    public function showService($categoryId, $serviceId)
    {
        $service = AttractionService::findOrFail($serviceId);
        return view('categories.showservice', compact('service'));
    }
}
