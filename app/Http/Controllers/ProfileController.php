<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, $id)
{  
    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->surname = $request->surname;
    $user->email = $request->email;
    if ($request->password) {
        $user->password = bcrypt($request->password);
    }
    $user->address = $request->address;
    $user->mobile = $request->mobile;
    $user->bio = $request->bio;

    $filePath = null;
    if ($request->hasFile('img')) { 
        $file = $request->file('img'); 
        $filePath = $file->store('uploads', 'public');

        if ($user->img) {
            Storage::disk('public')->delete($user->img);
        }

        $user->img = $filePath;
    }
    $user->save();

    return redirect()->back()->with('success', 'User details updated successfully.');
}

public function show(){
 return view('profile');
}

}
