<x-guest-layout>
@if ($errors->any())
    <div class="alert alert-danger mb-0">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="d-flex justify-content-center align-items-center vh-100" style="background-image: linear-gradient(pink, white);">
    <div class="container d-flex flex-column align-items-center">
        <div class="mt-5 mb-5">
            <p class="h1 mb-0">Игралиште</p>
            <p class="text-center">Скопје</p>
        </div> 
        <form method="POST" action="{{ route('login') }}" class="w-75">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Емаил адреса')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Лозинка')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->

            <div class="flex items-center mt-3 mb-3">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-warning hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Ја заборави лозинката?') }}
                    </a>
                @endif
            </div>
            <div class="text-center">
                <!-- <x-primary-button class="w-100">
                    {{ __('Логирај се') }}
                </x-primary-button>   -->
                
                <button class="bg-dark p-2 w-100 rounded-pill text-white">Логирај се</button>

            </div>
            
        </form>   
         <small class="fixed-bottom mb-4 text-center">Сите права задржани @ Игралиште Скопје</small>

    </div>
</div>

   
</x-guest-layout>
