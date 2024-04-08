<x-app-layout> 
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div id="vintageView" class=" container">
    <div class="row mb-2">
        <div class="col-9">
             <form class="form-inline" id="searchForm">
    <input class="mr-sm-2 w-100 rounded" type="search" id="searchInput" placeholder="Search" aria-label="Search" style="border: 1px solid 	rgb(190,190,190);">
</form>
        </div>
        <div class="col-2 d-flex">
    <p id="showList" class=" border rounded p-2 mr-1" style="background-color: pink;" onclick="changeBgColor('showList')"><i class="fa-solid fa-table-cells-large"></i></p>
    <p id="showGrid" class="border rounded p-2" onclick="changeBgColor('showGrid')"><i class="fa-solid fa-bars"></i></p>
</div>
    </div>  


<p class="d-flex justify-content-end align-items-center mb-3">Додај нов продукт
        <a class="ml-2 rounded text-white"  style=" text-decoration: none; padding: 1px 8px 1px 8px ;background-color: #808000; font-size:1.5rem; " href="{{route('addProduct')}}">+</a></p>


<div id="listView" style="display: block;">
@foreach($products as $product)
    <div class="card bg-light p-4 border rounded d-flex justify-content-between mb-3">
    @foreach ($product->images as $image)
            <img class="rounded mb-2" src="{{ asset('storage/' . $image->img) }}" alt="Product Image">
            @break
        @endforeach
        <a href="{{ route('showProduct', ['id' => $product->id]) }}"><span style="color: #808000" class="font-weight-bold">{{$product->id}} </span>  <span class="h5 text-dark"> {{$product->name}}</span></a>
        <div class="d-flex mt-2">Боја: <div style="background-color: {{ $product->color }}; height:20px; width:20px;" class="ml-2 rounded"> </div></div>
        <div class="d-flex justify-content-between">
            <p>Величина: {{$product->size}}</p>
            <p>Цена: <span class="font-weight-bold">{{$product->price}}</span> ден.</p>
        </div>
        
        @if($product->status == 1)
        <div class="d-flex">
        <a class="mr-2" href="{{ route('editProduct', ['id' => $product->id]) }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="{{ route('productStatus', ['id' => $product->id]) }}">
    <i class="fa-regular fa-circle-xmark"></i>
    </a>
        </div>
        @else
        <a href="{{ route('editProduct', ['id' => $product->id]) }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
@endif

    </div>
@endforeach
<div class="d-flex justify-content-center mt-4 mb-3">
            {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>

<div id="gridView" style="display: none;">
@foreach($products as $product)
<div class="bg-light p-3 border rounded d-flex justify-content-between mb-3">
<p style="color: #808000" class="font-weight-bold">{{$product->id}}</p>
<a href="{{ route('showProduct', ['id' => $product->id]) }}" class="text-dark">{{ $product->name }}</a>
@if($product->status == 1)
        <div class="d-flex">
        <a class="mr-2" href="{{ route('editProduct', ['id' => $product->id]) }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="{{ route('productStatus', ['id' => $product->id]) }}">
    <i class="fa-regular fa-circle-xmark"></i>
    </a>
        </div>
        @else
        <a href="{{ route('editProduct', ['id' => $product->id]) }}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
@endif
</div>
@endforeach  
<div class="d-flex justify-content-center mt-4">
            {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>

      </div>

</x-app-layout>

<script>
    document.getElementById("showList").addEventListener("click", function() {
        document.getElementById("listView").style.display = "block";
        document.getElementById("gridView").style.display = "none";
    });

    document.getElementById("showGrid").addEventListener("click", function() {
        document.getElementById("listView").style.display = "none";
        document.getElementById("gridView").style.display = "block";
    });

    function changeBgColor(elementId) {
        var element = document.getElementById(elementId);
        document.getElementById("showList").style.backgroundColor = "";
        document.getElementById("showGrid").style.backgroundColor = "";
        element.style.backgroundColor = "pink";
    }
</script>
