<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\UnauthorizedException;
use Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('admins.managements.user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * =======================
     * Custom Function Section
     * =======================
     */
    public function profile(Request $request)
    {
        $user = $request->user()->with('profiles');
        if(!$user) {
            if($request->expectsJson()){
                throw new UnauthorizedException();
                return;
            }
            return redirect()->route('login-page');
        }

        $profile = $request->user()->profile;

        if(!$profile)
        {
            $profile = new Profile();
            $profile->photos = asset('/storage/photos/default-photos.jpeg');
        }
        return response()->json($profile);
    }

    public function profile_update(Request $request, User $user = null)
    {
        if(!$user) {
            $user = $request->user();
        }

        $photoUploaded = $request->file('profile_photos')[0];

        $path = Storage::disk('public')->putFileAs('/photos', $photoUploaded, Str::uuid() . '.' . $photoUploaded->clientExtension());

        $user->profile()->updateOrCreate([
            'user_id' => $user->id
        ], [
            'photos' => '/storage/' . $path
        ]);

        return redirect()->back();
    }
}
