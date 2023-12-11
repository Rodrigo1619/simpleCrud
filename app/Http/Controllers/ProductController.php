<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        //obtener todos los productos
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }
    public function create(){
        return view ('products.create');
    }
    public function store(Request $request){
        //validation
        $data = $request->validate([
            'name'=> 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);
        $newProduct = Product::create($data);
        return redirect()->route('product.index');

    }
    //$product es la variable que viene desde el route para editar un producto y como es un Modelo
    public function edit(Product $product){
        //regresamos la vista de editar un producto con sus datos
        return view('products.edit', ['product' => $product]);
    }
    //obtenemos el producto y la informacion de la peticion, en este caso del formulario
    public function update(Product $product, Request $request){
        //data que recibimos del formulario
        $data = $request->validate([
            'name'=> 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);
        //metemos la data en nuestro modelo de producto
        $product->update($data);
        
        return redirect()->route('product.index')->with('succes', "Product '{$product->name}' updated succesfully");
    }
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('product.index')->with('succes', "Product '{$product->name}' deleted succesfully");
    }
}
