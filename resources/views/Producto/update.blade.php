@extends('layouts.plantilla') <!--llamo la plantilla html de la carpeta layouts-->

@section('title','Crear Producto') <!--defino el titulo de mi pagina -->

@section('content') <!--inicializo el contenido de mi html-->
<div class="max-w-5xl py-12 mx-auto sm:px-6 lg:px-8">
    
    <div class="bg-white p-8 rounded shadow-2xl ">
       
            <form class="updateForm px-2 rounded mx-auto max-w-2xl w-full  inputs space-y-3"  method="POST"  id="updateForm">
                @csrf <!--es obligatorio por seguridad-->
                @method('PUT')
                <input type="hidden" name="_token" id="token" value="{{ csrf_token()}}"/>
                <input class="id_producto" type="hidden"  name="id_producto" id="id_producto" value="{{$Productos->id}}"/>
                <div>
                    <h1 class="text-3xl font-bold">Modificar Producto</h1>
                    
                </div>
                <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="Codigo2">Codigo</label>
                    <input class="codigo2 border border-gray-400  py-1 rounded w-full focus:outline-none focus:border-teal-400"  type="number" max='999999999999999' id="codigo2" name="codigo2" value="{{$Productos->codigo}}"  />
                </div>
                <div class="w-1/2">
                    <label for="name2">Nombre</label>
                    <input class="name2 border border-gray-400  py-1 rounded w-full focus:outline-none focus:border-teal-400"  value="{{$Productos->name}}"  name="name2" id="name2"/>
                </div>
                </div>
                <div>
                <label for="descripcion">Descripcion</label>
                <textarea class="descripcion2 border border-gray-400  py-1 rounded w-full focus:outline-none focus:border-teal-400" type="text" name="descripcion2" id="descripcion2" value="" >{{$Productos->descripcion}}</textarea>
                
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="Precio">Precio</label>
                        <input class="precio2 border border-gray-400  py-1 rounded w-full focus:outline-none focus:border-teal-400" type="number"  min="0" step="000.01"  name="precio2" id="precio2" value="{{$Productos->precio}}"  placeholder="0.00"/>
                    </div>
                    <div class="w-1/2">
                        <label for="Stock">Stock</label>
                        <input class="stock2 border border-gray-400  py-1 rounded w-full focus:outline-none focus:border-teal-400" type="number" min="0" name="stock2" id="stock2" value="{{$Productos->stock}}" />
                    </div>
                </div>
                <div class=" px-12 py-2">
                     <button type="submit" id="btncargar" name="btncargar" class="block w-full  bg-blue-800 hover:bg-blue-600 p-2  rounded text-white font-bold transition duration-300">Cargar</button>
                </div>
         </form>
         
    </div>
    
</div>
            
<script>
        $('#updateForm').submit(function(e){
            e.preventDefault();
            var id2=$('#id_producto').val();
            var codigo2=$('#codigo2').val();
            var name2=$('#name2').val();
            var descripcion2=$('#descripcion2').val();
            var precio2=$('#precio2').val();
            var stock2=$('#stock2').val();
            var _token2=$('input[name=_token]').val();
            
             $.ajax({
                 type: "POST",
                 url: "{{ route('Producto.storeUpdate') }}",
                 data: {
                        id:id2,
                        codigo:codigo2,
                        name:name2,
                        descripcion:descripcion2,
                        precio:precio2,
                        stock:stock2,
                        _token:_token2
                 },
                 success: function (response) {
                    alert('el pruducto fue modificado con exito')
                  
                 }
             });
           }); 
                
               
           
        

</script>
@endsection
