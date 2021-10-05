<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    
    <!-- Toastr.js Después -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
    <!--favicon-->
    <!--Estilos-->
  
    
</head>
<body class="bg-gray-100 ">
    <!--header-->
        <div class="bg-blue-800 flex p-4 shadow-sm">
            <h5 class="flex-grow text-3xl font-bold text-white">Crud de Productos</h5>
            <p class= "font-bold text-xl text-white"><i class="fas fa-user-circle mr-2 "></i></i>Puca Agustin</p>
        </div>

    <!--sidebar paginas-->
        <div class="flex h-screen">
            <div class="p-6 border-r w-64 border-grey bg-white shadow-2xl">
                <ul id="tabs"  >
                    <li class="flex mb-6 font-bold"><a id="default-tab" href="{{route('Producto.index')}}">Productos</a></li>
                    <li class="flex mb-6 font-bold"><a href=" {{route('Producto.create')}}">Nuevo Producto</a></li>
                </ul>
            </div>
    <!--contenido de paginas-->
           
            <!--contenido-->
           @yield('content')
        </div>
   
<footer>
    @yield('footer')
</footer>
    
    <!--script-->
</body>
</html>