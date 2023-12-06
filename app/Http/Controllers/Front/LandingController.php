<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function index()
    {

        $items = Item::with(['type', 'brand'])->latest()->take(4)->get()->reverse(); //ini sebuah collation (query)
        // dd($items); uji coba untuk menampilkan data
        // ?$items =  Item::with(['type', 'brand'])->where
        
        return view('landing', [
            'items' => $items
        ]);
    }
}
