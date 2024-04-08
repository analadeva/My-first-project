<x-app-layout> 
<div id="profileView" class="container">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<p class="h3">Мој Профил</p>

<form action="{{ route('users.update', Auth::id()) }}" method="POST" enctype="multipart/form-data">   
    @csrf
    @method('PUT')
    
    @if(isset(Auth::user()->img))
    <div>
                <div class="col-12 col-md-8 col-lg-3">
            <img class="rounded-circle mr-0 mr-md-3 img-fluid" src="{{ asset(Storage::url(Auth::user()->img)) }}" alt="">
                </div>
                <div class="form-group mt-3">
    <label for="exampleFormControlFile1" style="color: #808000 ; text-decoration: underline; cursor: pointer;">Промени слика</label>
    <input name="img" type="file" class="bg-transparent form-control-file mt-1" id="exampleFormControlFile1" hidden>
</div>

            </div>
            @else
            <div>
                <div class="col-12 col-md-8 col-lg-3">
            <img class="rounded-circle mr-0 mr-md-3 img-fluid" src="https://static.vecteezy.com/system/resources/thumbnails/001/840/618/small/picture-profile-icon-male-icon-human-or-people-sign-and-symbol-free-vector.jpg" alt="">
                </div>
                <div class="form-group mt-3">
    <label for="exampleFormControlFile1" style="color: #808000 ; text-decoration: underline; cursor: pointer;">Промени слика</label>
    <input name="img" type="file" class="bg-transparent form-control-file mt-1" id="exampleFormControlFile1" hidden>
</div>

            </div>
            @endif


        <div class="mb-2">
            <x-input-label for="name" :value="__('Име')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="Auth::user()->name" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="mb-2">
            <x-input-label for="surname" :value="__('Презиме')" />
            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="Auth::user()->surname" autocomplete="surname" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
        </div>

        <div class="mb-2">
            <x-input-label for="email" :value="__('Email Адреса')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="Auth::user()->email" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

        </div>

        <div class="mb-2">
            <x-input-label for="update_mobile" :value="__('Телефонски број')" />
            <x-text-input id="update_mobile" name="mobile" type="number" class="mt-1 block w-full" :value="Auth::user()->mobile" autocomplete="new-mobile" />
            <x-input-error class="mt-2" :messages="$errors->get('mobile')" class="mt-2" />
        </div>

        <div class="mb-2">
            <x-input-label for="update_password_password" :value="__('Лозинка')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="mb-2">
            <x-input-label for="updateaddress" :value="__('Адреса')" />
            <x-text-input id="updateaddress" name="address" type="text" class="mt-1 block w-full" :value="Auth::user()->address" autocomplete="new-adress" />
            <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
        </div>

        <div class="mb-2">
    <x-input-label for="updatebio" :value="__('Биографија')" />
    <x-text-input id="updatebio" name="bio" type="text-area" class="mt-1 block w-full border" :value="Auth::user()->bio" autocomplete="new-bio" />
    <x-input-error :messages="$errors->get('bio')" class="mt-2" />
</div>

  <button class="btn btn-dark mt-2 btn-block mb-3">Зачувај</button>
    </form>
    
</div>

</x-app-layout>