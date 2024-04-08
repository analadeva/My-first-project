<x-app-layout> 
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<div id="brandsView" class="container">

<form class="form-inline" id="searchForm">
    <input class="mr-sm-2 w-75 rounded" type="search" id="searchInput" placeholder="Search" aria-label="Search" style="border: 1px solid 	rgb(190,190,190);">
</form>

    <p class="d-flex justify-content-end align-items-center">Додај нов бренд
        <a class="ml-2 rounded text-white"  style=" text-decoration: none; padding: 1px 8px 1px 8px ;background-color: #808000; font-size:1.5rem; " href="{{route('addBrand')}}">+</a></p>
<b>Aктивни</b> <br>
        @foreach ($brands as $brand)
@if($brand->status ==1)

<div class="bg-light p-3 border rounded d-flex justify-content-between mb-3">
<p style="color: #808000" class="font-weight-bold">{{$brand->id}}</p>
<p class="text-muted">{{$brand->name}}</p>
<div class="d-flex">
    <a href="{{ route('editBrand', ['id' => $brand->id]) }}" class="border bg-white rounded-circle p-2">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="{{ route('brandStatus', ['id' => $brand->id]) }}" class="border bg-white rounded-circle p-2">
    <i class="fa-regular fa-circle-xmark"></i>
    </a>
</div>
    
</div>

@endif
@endforeach
<b class="text-muted">Архива</b>
@foreach ($brands as $brand)
@if($brand->status ==0)
<div class="bg-light p-3 border rounded d-flex justify-content-between mb-3">
<p class="font-weight-bold text-muted">{{$brand->id}}</p>
<p class="text-muted">{{$brand->name}}</p>
    <a href="{{ route('editBrand', ['id' => $brand->id]) }}" class="border bg-white rounded-circle p-2">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
</div>

@endif
@endforeach

    </div>

</x-app-layout>