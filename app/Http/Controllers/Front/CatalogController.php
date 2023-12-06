<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class CatalogController extends Controller
{
    //
    public function index(){
        $items = Item::with(['type', 'brand'])->latest()->get()->reverse(); //ini sebuah collation (query)
        // dd($items); uji coba untuk menampilkan data
        
        return view('catalog', [
            'items' => $items
        ]);
    }
}
