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

        <style>
        .color-option {
            border: 2px solid transparent;
        }
        .color-option.selected {
            box-shadow: 3px 3px 2px 1px rgba(169,169,169);
               }
    </style>
    </head>
    <body>
    <div class="container mt-3">
        <form action="{{route('updateProduct', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
            <input type="text" name="id" value="{{ old('id', $product->id) }}" hidden>
        <div class="d-flex justify-content-between">
                    <p style="font-size:1.5rem;"><a href="{{route('product')}}" class="mr-3 text-dark"><i class="fas fa-arrow-left"></i></a><b>Уреди Продукт</b></p>
                    <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" name="status">
    <option disabled>Статус</option>
    <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Активен</option>
    <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Неактивен</option>
</select>
</div>
</div>
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
    <div class="form-group">
    <label for="exampleInputEmail1">Име на продикт</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('name', $product->name) }}">
        </div>

        <div class="form-group">
    <label for="exampleFormControlTextarea1">Опис</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="disc" rows="3">{{ old('disc', $product->disc) }}</textarea>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Цена:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="price" aria-describedby="emailHelp" value="{{ old('price', $product->price) }}">
        </div>

        <div class="form-group d-flex align-items-center mb-4">
            <p class="mr-2 mb-0">Количина:</p>
            <div onclick="increment()" style="cursor:pointer;  font-size:1.5rem; padding: 0rem 0.5rem 0.3rem 0.5rem;" class="mr-2 border rounded-circle">+</div>
            <input type="number" id="quantityInput" value="0" style="width:5%" class="mr-2 rounded border border-light" name="quantity">
            <div onclick="decrement()" style="cursor:pointer; font-size:1.5rem; padding: 0rem 0.7rem 0.3rem 0.7rem;" class="border rounded-circle">-</div>
        </div>

        <div class="form-group d-flex">
    <p>Величина:</p>
    <input type="radio" id="option1" name="size" value="XS" hidden>
    <label for="option1" class="p-1 mr-2 rounded ml-3" style="background-color:#FFC0CB;">XS</label>
    
    <input type="radio" id="option2" name="size" value="S" hidden>
    <label for="option2" class="p-1 mr-2 rounded" style="background-color:#FFC0CB;">S</label>
    
    <input type="radio" id="option3" name="size" value="M" hidden>
    <label for="option3" class="p-1 mr-2 rounded" style="background-color:#FFC0CB;">M</label>

    <input type="radio" id="option4" name="size" value="L" hidden>
    <label for="option4" class="p-1 mr-2 rounded" style="background-color:#FFC0CB;">L</label>

    <input type="radio" id="option5" name="size" value="XL" hidden>
    <label for="option5" class="p-1 mr-2 rounded" style="background-color:#FFC0CB;">XL</label>
</div>

<div class="form-group">
    <label for="exampleFormControlTextarea1">Совет за величина</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="sizeDis" rows="3">{{ old('sizeDis', $product->sizedis) }}</textarea>
</div>


  <div class="form-group">
    <label for="selectedColor" class="mb-0">Боја:</label>
    <input type="hidden" name="color" id="selectedColor"> 
 </div>

  <div id="color-options" class="mb-3 d-flex">
            <div class="color-option mr-2" style="background-color: red; width:5%; height:25px;" onclick="selectColor('red', this)"></div>
            <div class="color-option mr-2" style="background-color: orange; width:5%; height:25px;" onclick="selectColor('orange', this)"></div>
            <div class="color-option mr-2" style="background-color: yellow; width:5%; height:25px;" onclick="selectColor('yellow', this)"></div>
            <div class="color-option mr-2" style="background-color: green; width:5%; height:25px;" onclick="selectColor('green', this)"></div>
            <div class="color-option mr-2" style="background-color: blue; width:5%; height:25px;" onclick="selectColor('blue', this)"></div>
            <div class="color-option mr-2" style="background-color: pink; width:5%; height:25px;" onclick="selectColor('pink', this)"></div>
            <div class="color-option mr-2" style="background-color: purple; width:5%; height:25px;" onclick="selectColor('purple', this)"></div>
            <div class="color-option mr-2" style="background-color: grey; width:5%; height:25px;" onclick="selectColor('grey', this)"></div>
            <div class="color-option mr-2 border" style="background-color: white; width:5%; height:25px;" onclick="selectColor('white', this)"></div>
            <div class="color-option" style="background-color: black; width:5%; height:25px;" onclick="selectColor('black', this)"></div>
        </div>

        <div class="form-group">
    <label for="exampleFormControlTextarea1">Совети за одржување</label>
    <textarea class="form-control" name="maintenance" id="exampleFormControlTextarea1" rows="3">{{ old('maintenance', $product->maintenance) }}</textarea>
</div>


  <div class="form-group">
    <label for="exampleInputEmail1">Ознаки</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="tags" aria-describedby="emailHelp">
        </div>

        <div class="form-group mt-3">
                    <label>
                        <h5>Слики</h5>
                    </label>
                    <div class="d-flex justify-content-around">
                    <div class="form-group">
                    <label for="exampleFormControlFile1" class="bg-light px-5 py-4 mr-2" style="cursor: pointer;">+</label>
                    <input name="images[]" type="file" class="form-control-file mt-1" id="exampleFormControlFile1"hidden>
                </div>
                <div class="form-group">
                <label for="exampleFormControlFile2" class="bg-light px-5 py-4 mr-2" style="cursor: pointer;">+</label>
                    <input name="images[]" type="file" class="form-control-file mt-1" id="exampleFormControlFile2"hidden>
                </div>
                <div class="form-group">
                <label for="exampleFormControlFile3" class="bg-light px-5 py-4 mr-2" style="cursor: pointer;">+</label>
                    <input name="images[]" type="file" class="form-control-file mt-1" id="exampleFormControlFile3"hidden>
                </div>
                <div class="form-group">
                <label for="exampleFormControlFile4" class="bg-light px-5 py-4" style="cursor: pointer;">+</label>
                    <input name="images[]" type="file" class="form-control-file mt-1" id="exampleFormControlFile4"hidden>
                </div>
                    </div>
                
        </div>
        <div class="d-flex justify-content-start">
        <div class="form-group mr-4">
    <label for="exampleFormControlSelect2">Бренд</label>
    <select class="form-control" id="exampleFormControlSelect2" name="brand">
        <option selected disabled>Одбери</option>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="exampleFormControlSelect1">Категорија</label>
    <select class="form-control" id="exampleFormControlSelect1" name="category1">
        <option selected disabled>Одбери</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" data-brand="{{ $category->brand_id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
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

<script>
        function selectColor(color, element) {

            var colorOptions = document.querySelectorAll('.color-option');
            colorOptions.forEach(function(option) {
                option.classList.remove('selected');
            });

            element.classList.add('selected');

            document.getElementById('selectedColor').value = color;
        }


        const radioButtons = document.querySelectorAll('input[type=radio]');
    
    radioButtons.forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('label[for^=option]').forEach(label => {
                label.style.backgroundColor = '#FFC0CB'; 
            });
            
            const selectedLabel = document.querySelector(`label[for=${this.id}]`);
            selectedLabel.style.backgroundColor = 'olive';
        });
    });

    function increment() {
    var inputElement = document.getElementById('quantityInput');
    var currentValue = parseInt(inputElement.value);
    inputElement.value = currentValue + 1;
  }

  function decrement() {
    var inputElement = document.getElementById('quantityInput');
    var currentValue = parseInt(inputElement.value);
    if (currentValue > 0) {
      inputElement.value = currentValue - 1;
    }
  }

//   var brandSelect = document.getElementById("exampleFormControlSelect2");
//     var categorySelect = document.getElementById("exampleFormControlSelect1");

//     brandSelect.addEventListener("change", function() {
//         var selectedBrandId = this.value;
//         categorySelect.innerHTML = '<option selected disabled>Одбери</option>';
//         fetch('/api/categories/' + selectedBrandId)
//             .then(response => response.json())
//             .then(data => {
//                 data.forEach(function(category) {
//                     var option = document.createElement("option");
//                     option.value = category.id;
//                     option.text = category.name;
//                     categorySelect.appendChild(option);
//                 });
//             });
//     });
    </script>