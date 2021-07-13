<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Category;

class HomeController extends Controller
{
    public function index() {
        $ads = Ad::orderBy('id', 'DESC')->get();;
        $categories = Category::all();
        return view('pages.index', [
            'ads' => $ads,
            'categories' => $categories
        ]);
    }

    public function getAdsByCategory() {
        
    }
}
