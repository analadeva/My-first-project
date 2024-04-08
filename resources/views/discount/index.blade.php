<x-app-layout> 
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif 

<div id="discountsView" class="container">

<form class="form-inline" id="searchForm">
    <input class="mr-sm-2 w-75 rounded" type="search" id="searchInput" placeholder="Search" aria-label="Search" style="border: 1px solid 	rgb(190,190,190);">
</form>

<p class="d-flex justify-content-end align-items-center mt-2 mb-2">Додај нов попуст/промо код
        <a class="ml-2 rounded text-white"  style=" text-decoration: none; padding: 1px 8px 1px 8px ;background-color: #808000; font-size:1.5rem; " href="{{route('addDiscount')}}">+</a></p>
        <div>

       
        <b>Aктивни</b>
@foreach ($discounts as $discount)
@if($discount->status == 1)
<div class="bg-light p-3 border rounded d-flex justify-content-between mb-3">
<p style="color: #808000" class="font-weight-bold">{{$discount->id}}</p>
<p class="text-muted">{{$discount->name}}</p>

@if($discount->status == 1)
        <div class="d-flex">
        <a href="{{ route('editDiscount', ['id' => $discount->id]) }}" class="border bg-white rounded-circle p-2">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    
    <a href="{{ route('discountStatus', ['id' => $discount->id]) }}" class="border bg-white rounded-circle p-2">
    <i class="fa-regular fa-circle-xmark"></i>
    </a>
        </div>
        @else
        <a href="{{ route('editDiscount', ['id' => $discount->id]) }}" class="border bg-white rounded-circle p-2">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
@endif
</div>

@endif
@endforeach
 </div>

<div>
<b class="text-muted">Архива</b>  

@foreach ($discounts as $discount)
@if($discount->status == 0)
<div class="bg-light p-3 border rounded d-flex justify-content-between mb-3">
<p class="font-weight-bold text-muted">{{$discount->id}}</p>
<p class="text-muted">{{$discount->name}}</p>
    <a href="{{ route('editDiscount', ['id' => $discount->id]) }}" class="border bg-white rounded-circle p-2">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
</div>
@endif
@endforeach
</div>
</div>

</x-app-layout>