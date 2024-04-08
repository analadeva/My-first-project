<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'address' => 'nullable|string|max:255',
        'mobile' => 'nullable|numeric',
        'bio' => 'nullable|string|max:255',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:100000',
    ]);

    $userData = [
        'name' => $validatedData['name'],
        'surname' => $validatedData['surname'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']),
        'address' => $validatedData['address'],
        'mobile' => $validatedData['mobile'],
        'bio' => $validatedData['bio'],
    ];

    $user = User::create($userData);

    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filePath = $file->store('uploads', 'public');

        if ($user->img) {
            Storage::disk('public')->delete($user->img);
        }

        $user->img = $filePath;
        $user->save(); 
    }

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}

    public function one(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $userData = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];

    return view('auth.register2', compact('userData'));   
 }

 public function two(Request $request){
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ]);

    $userData = [
        'name' => $validatedData['name'],
        'surname' => $validatedData['surname'],
        'email' => $validatedData['email'],
        'password' => $validatedData['password'],
    ];

return view('auth.register3', compact('userData'));   
}
    
}
