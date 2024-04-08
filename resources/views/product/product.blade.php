<!DOCTYPE html>
<html>
    <head>
        <title>Document</title>
        <meta charset="utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />

        <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- CSS script -->
        <link rel="stylesheet" href="style.css">
        <!-- Latest Font-Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <body>
    <div class="container mt-5">
    <div class="d-flex justify-content-between">
            <p style="font-size:1.5rem;"><a href="{{route('product')}}" class="mr-3 text-dark"><i class="fas fa-arrow-left"></i></a><b>Продукт</b></p>
            <a href="{{ route('editProduct', ['id' => $product->id]) }}" class="text-dark"><i class="fas fa-pen-square"></i>  Уреди продукт</a>
</div>        <h1 class="text-center mb-2">{{ $product->name }}</h1>
        <div class="d-flex flex-wrap justify-content-center mb-2">
    @foreach ($product->images as $key => $image)
        @if ($key === 0)
            <img class="rounded mb-2 mr-2 w-75" src="{{ asset('storage/' . $image->img) }}" alt="Product Image"> 
        @else
            <img class="rounded mb-2 mr-2 w-25" src="{{ asset('storage/' . $image->img) }}" alt="Product Image">
        @endif
    @endforeach
</div>
    <p class="text-center mb-3">{{ $product->disc}}</p>
    <i>Цена: <b>{{ $product->price}}</b> ден.</i>
    <hr>
    <p class="mt-3">Количина: {{$product->quantity}}</p>
    <p class="mb-0">Величина: {{ $product->size}}</p>
    <small>Совети за величина: {{ $product->sizedis}}</small>
    <div class="d-flex mt-3 mb-3">Боја: <div style="background-color: {{ $product->color }}; height:20px; width:20px;" class="ml-2 rounded"> </div></div>
            <p>Совети за одржување: {{$product->maintenance}}</p>
<hr>
    <div class="d-flex">
        <p>Бренд: {{ $product->brand->name }}</p>
        <p class="ml-5">Категорија: {{ $product->category->name }}</p>
    </div>
<hr>
    <i><b>Ознаки:</b></i>
    <div class="d-flex mt-2">
@foreach ($product->tags as $tag)
    <div class="border rounded p-2 mr-2">
    {{$tag->name}}
    </div> 
@endforeach
</div>
</div>

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>
