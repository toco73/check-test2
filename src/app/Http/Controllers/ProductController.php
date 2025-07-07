<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    public function index()
    {        
        $products = Product::Paginate(6);

        return view('product',compact('products'));
    }
    public function search(Request $request)
    {
        $products = Product::query()
            ->KeywordSearch($request->keyword)
            ->SortByPrice($request->sort)
            ->paginate(6)
            ->appends([
                'keyword' => $request->keyword,
                'sort' => $request->sort,
            ]);

        return view('product',compact('products'));
    }

    public function add()
    {
        $seasons = Season::all();
        return view('register',compact('seasons'));
    }

    public function store(ProductRequest $request)
    {
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images','public');
        }else{
            $imagePath = null;
        }
    
        $products = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $imagePath,
            'description' => $request->input('description'),
        ]);
        $products->seasons()->attach($request->input('season_id'));

        return redirect('/products');
    }

    public function show($productId)
    {
        $product = Product::with('seasons')->findOrFail($productId);
        $seasons = Season::all();
        return view('detail',compact('product','seasons'));
    }

    public function update(ProductRequest $request,$productId)
    {
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images','public');
        }
        $product = Product::findOrFail($productId);
        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image' => $imagePath,
            'description' => $request->input('description'),
        ]);
        $product->seasons()->sync($request->input('season_id',[]));

        return redirect('/products');
    }
    public function destroy($productId)
    {
        $product = Product::findOrFail($productId);
        $product->seasons()->detach();
        $product->delete();

        return redirect('/products');
    }
}
