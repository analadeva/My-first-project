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
        <div class="container mt-3">
            <form action="{{route('updateDiscount', ['id' => $discount->id])}}" method="POST">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        @csrf
        <div class="d-flex justify-content-between">
                    <p style="font-size:1.5rem;"><a href="{{route('product')}}" class="mr-3 text-dark"><i class="fas fa-arrow-left"></i></a><b>Уреди попуст</b></p>
                    <div class="form-group">
    <select class="form-control" id="exampleFormControlSelect1" name="status">
        <option selected disabled>Статус</option>
        <option value="1" {{ old('status', $discount->status) == 1 ? 'selected' : '' }}>Активен</option>
    <option value="0" {{ old('status', $discount->status) == 0 ? 'selected' : '' }}>Неактивен</option>
    </select>
</div>
        </div>

        

        <div class="form-group">
    <label for="exampleInputEmail1">Име</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('name', $discount->name) }}">
        </div>

        <div class="form-group">
    <label for="exampleInputEmail1">Попуст</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="disc" aria-describedby="emailHelp" value="{{ old('name', $discount->discount) }}">
        </div>

        
        <div class="d-flex justify-content-start">
    <div class="form-group mr-4">
        <label for="exampleFormControlSelect1">Категорија</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category1">
            <option selected disabled>Одбери</option>
            @foreach($discategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect2">Категорија</label>
        <select class="form-control" id="exampleFormControlSelect2" name="category2">
            <option selected disabled>Одбери</option>
            @foreach($discategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Додели попуст на:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="tags" aria-describedby="emailHelp">
        </div>
<div class="d-flex align-items-center">
    <button class="btn btn-dark mt-2 btn-block mb-3 mr-3">Зачувај</button>
    <a href="" class="text-dark">Откажи</a>
</div>
        </form>
        </div>
        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>