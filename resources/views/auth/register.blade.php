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
   
    <div class="d-flex justify-content-center align-items-center custom-div pt-5 pt-md-0" style="background-color: #ffe6ea;">
    <div class="container d-flex flex-column align-items-center">
        <div class="mt-5 mb-5">
            <p class="h1 mb-0">Игралиште</p>
            <p class="text-center">Скопје</p>
        </div> 
<form method="POST" action="{{ route('registerOne') }}" class="w-75 mb-0 mb-md-4">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
    <label for="exampleInputEmail1"><b>Емаил адреса</b></label>
    <input type="email" class="block mt-1 w-full rounded bg-transparent" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div> 
       <!-- Password -->
  <div class="form-group">
    <label for="exampleInputPassword1"><b>Лозинка</b></label>
    <input type="password" class="block mt-1 w-full rounded bg-transparent" id="exampleInputPassword1" name="password">
  </div>

  

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-transparent border-dark"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <button class="bg-dark p-2 w-100 rounded-pill text-white mt-3">Регистрирај се</button>
</form>
        <p class="text-center mt-4 mb-4">или</p>

        <p class="text-center mb-3 rounded-pill p-2" style="border: 3px solid pink;"><a href="{{ route('google') }}"><i class="fa-brands fa-google"></i> Регистрирај се преку Google</a></p>
        <p class="text-center mb-3 rounded-pill p-2" style="border: 3px solid pink;"><a href="{{ route('facebook') }}"><i class="fa-brands fa-facebook"></i> Регистрирај се преку Facebook</a></p>

           <p class="text-center font-weight-bold">Веќе имаш профил? <a class="underline text-sm text-warning hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Логирај се') }}
            </a></p> 


    <small class="text-center mt-5 pb-3 pb-md-0">Сите права задржани @ Игралиште Скопје</small>

    </div>
    </div>
    
</x-guest-layout>
