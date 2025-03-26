<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $request->validate([
            'language' => 'required|in:fr,en,ar,es'
        ]);

        session(['locale' => $request->language]);
        app()->setLocale($request->language);

        return redirect()->back();
    }
}
