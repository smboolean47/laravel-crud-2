<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // prendo i dati del form
        $data = $request->all();
        // validazione
        $request->validate([
            "name" => "required|string|max:80|unique:products",
            "type" => [
                "required", 
                Rule::in(["lunga", "corta", "cortissima"])
            ],
            "cooking_time" => "required|integer|min:1|max:60",
            "weight" => "required|integer|min:1|max:2000",
            "description" => "required|string",
            "image" => "nullable|url"
        ]);
        // inserisco un nuovo record nella tabella
        $newProduct = Product::create($data);

        return redirect()->route('products.show', $newProduct->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view("products.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("products.edit", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // prendo tutti i dati del form
        $data = $request->all();
       // validazione
       $request->validate([
            "name" => "required|string|max:80|unique:products,name,{$product->id}",
            "type" => [
                "required", 
                Rule::in(["lunga", "corta", "cortissima"])
            ],
            "cooking_time" => "required|integer|min:1|max:60",
            "weight" => "required|integer|min:1|max:2000",
            "description" => "required|string",
            "image" => "nullable|url"
        ]);
        // aggiorno la risorsa con i nuovi dati
        $product->update($data);
        // restituisco la pagina show della risorsa modificata
        return redirect()->route("products.show", $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route("products.index");
    }
}
