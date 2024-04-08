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
<form method="POST" action="{{ route('registerTwo') }}" class="w-75 mb-4">
        @csrf

        <div class="form-group">
    <label for="exampleInputEmail1"><b>Име</b></label>
      <input type="text" class="block mt-1 w-full rounded bg-transparent" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
</div> 
<div class="form-group">
    <label for="exampleInputEmail1"><b>Презиме</b></label>
      <input type="text" class="block mt-1 w-full rounded bg-transparent" id="exampleInputEmail1" aria-describedby="emailHelp" name="surname">
</div> 

        <!-- Email Address -->
        <div class="form-group">
    <label for="exampleInputEmail1"><b>Емаил адреса</b></label>
      <input type="email" class="block mt-1 w-full rounded bg-transparent" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $userData['email'] }}">
</div> 
       <!-- Password -->
  <div class="form-group mb-3">
    <label for="exampleInputPassword1"><b>Лозинка</b></label>
    <input type="password" class="block mt-1 w-full rounded bg-transparent" id="exampleInputPassword1" name="password" value="{{ $userData['password'] }}">
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

<small>Со вашата регистрација се согласувате со <span class="underline"><b>Правилата и условите</b></span> за кориснички сајтови.</small>
    </div>
    </div>
    
</x-guest-layout>