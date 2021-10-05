@extends('layouts.plantilla') <!--llamo la plantilla html de la carpeta layouts-->
@section('title','Lista de Productos') <!--defino el titulo de mi pagina -->
@section('content') <!--inicializo el contenido de mi html-->
<div  class="max-w-5xl py-12 mx-auto sm:px-6 lg:px-8">
  <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
   

    <table id="tabla-producto" class="table-fixed w-full">
      <thead>
        <tr  class="bg-blue-800 text-white">
          <th >Codigo</th>
          <th >Nombre</th>
          <th >Descripcion</th>
          <th >Precio</th>
          <th >Stock</th>
          <th class="w-28 py-4 ...">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($Productos as $producto)
        <tr id="producto{{$producto->id}}">
          <td id="codigo" class="codigo py-3 px-6">{{ $producto->codigo}} </td>
          <td id="name" class="name p-3">{{ $producto->name}}</td>
          <td id="descripcion" class="descripcion p-3 text-center">{{ $producto->descripcion}}</td>
          <td id="precio" class="precio p-3 text-center">{{ $producto->precio}}</td>
          <td id="stock" class="stock p-3 text-center">{{ $producto->stock}}</td>
          <td class="p-3">
            <button  type="button" id="{{$producto->id}}" name="delete"   class="delete bg-red-500 text-white px-3 py-1 rounded-sm">
            <i class="fas fa-trash"></i></button>

            <button id="update" name="update"  onclick="updateProducto({{$producto->id}})" class="update bg-green-500 text-white px-3 py-1 rounded-sm">
            <i class="fas fa-pen"></i></button>
          </td>
        </tr>
        @endforeach
        
        
      </tbody>
    </table>

    <div class="bg-white px-4 py-2 flex items-center justify-between border-t border-gray-200 sm:px-6">
      <div class="flex-1 flex justify-between sm:hidden">
        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
          Previous
        </a>
        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
          Next
        </a>
      </div>
      <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
          <p class="text-sm text-gray-700">
            Showing
            <span class="font-medium">1</span>
            to
            <span class="font-medium">10</span>
            of
            <span class="font-medium">97</span>
            results
          </p>
        </div>
        <div>
          <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
              <span class="sr-only">Previous</span>
              <!-- Heroicon name: solid/chevron-left -->
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </a>
            <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
            <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
              1
            </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
              2
            </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
              3
            </a>
            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
              ...
            </span>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
              10
            </a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
              <span class="sr-only">Next</span>
              <!-- Heroicon name: solid/chevron-right -->
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
            </a>
          </nav>
        </div>
      </div>
    </div>

  </div>
</div>
 
<!--modal delete-->
            <div id="confirmModal"  class="modal fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-blue-500 bg-opacity-50 transform scale-0 transition-transform duration-300" aria-hidden="true" >
              <div id="closebutton" class="absolute bg-black opacity-80 inset-0 z-0"></div>    
                <div class="w-full  max-w-lg p-2 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                    <!--content-->
                    <div class="">
                        <!--body-->
                        <div class="text-center p-4 flex-auto justify-center ">
                            <div class="flex space-x-8">
                                <div class="w-8">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex  text-red-500 " viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                  </svg>
                                </div>
                                  <div class=" my-5 text-center">
                                      <h1 class="text-xl font-bold  ">Eliminar</h1>
                                  </div>
                            </div>
                                  <p class="text-sm text-gray-500 px-8">¿Esta Seguro que decea eliminar este producto de la lista ?</p>    
                        </div>
                        <!--footer-->
                        <div class="p-3  mt-2 text-center space-x-4 md:block">
                            <button  id="btncancelar" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                Cancel
                            </button>
                            <button id="btndelete" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>




<script>
  var id_producto;
  const modal = document.getElementById('confirmModal')
  
  $(document).on('click','.delete',function(){
    $('#btndelete').text('Eliminado');
      id_producto= $(this).attr('id'); 
     
      const closebutton = document.getElementById('closebutton')
      const btncancelar = document.getElementById('btncancelar')
      modal.classList.add('scale-100');
      closebutton.addEventListener('click',()=>modal.classList.remove('scale-100'))
      btncancelar.addEventListener('click',()=>modal.classList.remove('scale-100'))
     
  });
  
      $('#btndelete').click(function(){
                      $.ajax({
                        url: 'Producto/'+ id_producto,
                        type:'DELETE',
                        data: {
                          "_token": $("meta[name='csrf-token']").attr("content")
                        },
                        beforeSend:function(){
                          $('#btndelete').text('Eliminado...');
                        },
                        success:function(data){
                          setTimeout(function(){
                            modal.classList.remove('scale-100');
                           $('#producto'+id_producto).remove();
                           alert('El registro fue eliminado correctamente','Eliminar registro' ,{timeout:3000});
                          },2000);
                        }
                      });
             });
    
</script>

<script>
      function updateProducto(id){
        window.location.href = "Producto/update/"+id;
      }
</script>
@endsection()
