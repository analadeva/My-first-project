<x-guest-layout>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
    <div class="d-flex justify-content-center align-items-center pt-5 pt-md-0" style="background-color: #ffe6ea;">
    <div class="container d-flex flex-column align-items-center">
        <div class="mt-5 mb-5">
            <p class="h1 mb-0">Игралиште</p>
            <p class="text-center">Скопје</p>
        </div> 
<form method="POST" action="{{ route('registerUser') }}" class="w-75 mb-4" enctype="multipart/form-data">
    @method('POST')
        @csrf
     <div class="hidden">
<input type="text" class="block mt-1 w-full rounded bg-transparent" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ $userData['name'] }}">
      <input type="text" class="block mt-1 w-full rounded bg-transparent" id="exampleInputEmail1" aria-describedby="emailHelp" name="surname" value="{{ $userData['surname'] }}">
      <input type="email" class="block mt-1 w-full rounded bg-transparent" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $userData['email'] }}">
    <input type="password" class="block mt-1 w-full rounded bg-transparent" id="exampleInputPassword1" name="password" value="{{ $userData['password'] }}">
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-transparent border-dark"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" 
                            value="{{ $userData['password'] }}" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
     </div>

     <div class="d-flex flex-column align-items-center">
                <div class="col-12 col-md-8 col-lg-3">
            <img class="rounded-circle mr-0 mr-md-3 img-fluid" src="https://static.vecteezy.com/system/resources/thumbnails/001/840/618/small/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-free-vector.jpg" alt="">
                </div>
                <div class="form-group mt-3">
    <label for="exampleFormControlFile1" style="color: #808000 ; text-decoration: underline; cursor: pointer;">Одбери слика</label>
    <input name="img" type="file" class="bg-transparent form-control-file mt-1" id="exampleFormControlFile1" hidden>
</div>
            </div>

            <div class="form-group">
    <label for="exampleInputEmail1"><b>Адреса</b></label>
      <input type="text" class="block mt-1 w-full rounded bg-transparent" id="exampleInputEmail1" aria-describedby="emailHelp" name="address">
</div>
<div class="form-group">
    <label for="exampleInputEmail2"><b>Телефонски број</b></label>
      <input type="number" class="block mt-1 w-full rounded bg-transparent" id="exampleInputEmail2" aria-describedby="emailHelp" name="mobile">
</div>

<div class="form-group">
    <label for="exampleInputEmail3"><b>Биографија</b></label>
    <textarea class="block mt-1 w-full rounded bg-transparent"  name="bio" id="exampleInputEmail3" cols="30" rows="3"></textarea>
</div>

      
        <button class="bg-dark p-2 w-100 rounded-pill text-white mt-3">Регистрирај се</button>

</form>
<small>Можеш да ги прерипнеш овие информации</small>

    </div>
    </div>
    
</x-guest-layout>