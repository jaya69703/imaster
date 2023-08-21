<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
// use Intervention\Image\Facades\Storage;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    public function index()
    {
        $title = "imFeels";
        $menu = "Profile";
        $submenu = Auth::user()->name;

        return view('pages.profile-user', compact(
            'title',
            'menu',
            'submenu',
        ));
    }

    public function ListUsers()
    {
        $title = "imFeels";
        $menu = "Profile Dosen";
        $submenu = "Daftar Dosen";
        $users = User::where('user_position', 'Dosen')->get();

        return view('pages.users-list', compact(
            'title',
            'menu',
            'submenu',
            'users',
        ));
    }

    public function DetailUser($id)
    {
        $user = User::findorFail($id);
        $title = "imFeels";
        $menu = "Profile Dosen";
        $submenu = "Detail Dosen";

        return view('pages.users-detail', compact(
            'title',
            'menu',
            'submenu',
            'user',
        ));
    }

    public function updateUser(Request $request)
    {
        try {
            $userId = Auth::id();
            $user = User::findOrFail($userId); // Memanggil 'firstOrFail()' untuk mendapatkan objek user
    

        
            if($request->hasFile('image')){
                $oldPhoto = $user->image;

                if ($oldPhoto !== 'default.png' && Storage::disk('public')->exists('images/profile/' . $oldPhoto)) {
                    Storage::disk('public')->delete('images/profile/' . $oldPhoto);
                }
                
                $filename = $request->image->getClientOriginalName();
                $request->image->storeAs('images/profile',$filename,'public');
                Auth()->user()->update(['image'=>$filename]);
            }
    
            // Update atribut lain
            $user->update([
                'name' => $request->input('name'),
                'user_phone' => $request->input('user_phone'),
                // 'email' => $request->input('email'),
                'user_placebirth' => $request->input('user_placebirth'),
                'user_datebirth' => $request->input('user_datebirth'),
                'user_typecard' => $request->input('user_typecard'),
                'user_idcard' => $request->input('user_idcard'),
                'user_position' => $request->input('user_position'),
                'user_gender' => $request->input('user_gender'),
                'user_religion' => $request->input('user_religion'),
                'user_from' => $request->input('user_from'),
            ]);
    
            $user->save(); // Menyimpan perubahan ke database
            
        } catch (\Exception $e) {
            return redirect()->route('home.index')->with('error', 'Terjadi kesalahan saat memperbarui profil.');
        }
        // Log::info('Photo Update:', ['image' => $imageName]);
        return redirect()->route('home.index')->with('success', 'Profil berhasil diperbarui.');
    }
    
}
