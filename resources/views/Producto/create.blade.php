@extends('layouts.plantilla') <!--llamo la plantilla html de la carpeta layouts-->

@section('title','Modificar Producto') <!--defino el titulo de mi pagina -->

@section('content') <!--inicializo el contenido de mi html-->
<div class="max-w-5xl py-12 mx-auto sm:px-6 lg:px-8">
    
    <div class="bg-white p-8 rounded shadow-2xl ">
            <form class="px-2 rounded mx-auto max-w-2xl w-full  inputs space-y-3" action="{{route('Producto.store')}}" method="POST">
                @csrf <!--es obligatorio por seguridad-->
                <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}"/>
                <div>
                    <h1 class="text-3xl font-bold">Nuevo Producto</h1>
                    <p class="text-gray-600">
                            Carga un producto nuevo a la BD
                    </p>
                </div>
                <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="Codigo">Codigo</label>
                    <input class="border border-gray-400  py-1 rounded w-full focus:outline-none focus:border-teal-400"  type="number" max='99999999999999999' id="codigo" name="codigo"/>
                    <div class="text-danger" id="condicioncodigo"></div>
                </div>
                <div class="w-1/2">
                    <label for="name">Nombre</label>
                    <input class="border border-gray-400  py-1 rounded w-full focus:outline-none focus:border-teal-400"  name="name" id="name"/>
                </div>
                </div>
                <div>
                <label for="descripcion">Descripcion</label>
                <textarea class="border border-gray-400  py-1 rounded w-full focus:outline-none focus:border-teal-400" type="text" name="descripcion" id="descripcion"></textarea>
                
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="Precio">Precio</label>
                        <input class="border border-gray-400  py-1 rounded w-full focus:outline-none focus:border-teal-400" type="number"  min="0" step="0.01"  name="precio" id="precio" placeholder="0.00"/>
                    </div>
                    <div class="w-1/2">
                        <label for="Stock">Stock</label>
                        <input class="border border-gray-400  py-1 rounded w-full focus:outline-none focus:border-teal-400" type="number" min="0" name="stock" id="stock"/>
                    </div>
                </div>
                <div class=" px-12 py-2">
                     <button  id="btncargar" name="btncargar" class="block w-full  bg-blue-800 hover:bg-blue-600 p-2  rounded text-white font-bold transition duration-300">Cargar</button>
                </div>
         </form>
    </div>
</div>

@endsection()