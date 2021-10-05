<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;//recupera datos de la vista


use App\Models\producto;
class ProductoController extends Controller
{
    public function index(){

            $Productos=producto::all(); //seleccionamos todos los registros 
             return view('Producto.index', compact('Productos'));
    }

    public function create(){
        return view('Producto.create');
    }
    
    public function store(Request $request){
        $producto=new producto;
        $producto->codigo=$request->codigo;
        $producto->name=$request->name;
        $producto->descripcion=$request->descripcion;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->save();

        return redirect()->route('Producto.index');
    }  //para almacenar los registros enviados
    
    
    public function update($id){
        $Productos = producto::find($id);
        
        return view('Producto.update', compact('Productos'));
    }
    
    public function storeUpdate(Request $request){
        $producto = producto::find($request->id);
        $producto->codigo=$request->codigo;
        $producto->name=$request->name;
        $producto->descripcion=$request->descripcion;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->save();
        
         return redirect()->route('Producto.index');
    }
    public function deleteproducto($id){
       // delete
            $producto = producto::find($id);
            $producto->delete();

            return response()->json([
                'message' => 'Articulo Eliminado'
  ]);    
    }

   
}
