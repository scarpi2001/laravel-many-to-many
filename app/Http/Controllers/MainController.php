<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Typology;
use App\Models\Product;

class MainController extends Controller
{
    //home per categorie
    public function home() {

        $categories = Category :: all();

        return view('pages.home', compact('categories'));
    }

    //home per prodotti
    public function products() {

        $products = Product :: all();

        return view('pages.product-home', compact('products'));
    }

    //create
    public function productCreate() {

        $typologies = Typology :: all();
        $categories = Category :: all();

        return view('pages.product.create', 
                compact('categories', 'typologies')
            );
    }

    public function productStore(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'typology_id' => 'required|integer',
            'categories' => 'required|array'
        ]);

        $code = rand(10000, 99999);
        $data['code'] = $code;

        $product = Product :: make($data);
        $typology = Typology :: find($data['typology_id']);

        $product -> typology() -> associate($typology);
        $product -> save();

        $categories = Category :: find($data['categories']);
        $product -> categories() -> attach($categories);

        return redirect() -> route('product.home');
    }
}
