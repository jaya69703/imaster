<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'iMaster';
        $subtitle = 'iMaster User Management';
        $menu = 'User Management';
        $submenu = 'User Index';
        $user = User::all();

        return view('pages.usermanage.usermanage-index', compact(
            'title',
            'subtitle',
            'menu',
            'submenu',
            'user',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $title = 'iMaster';
        $subtitle = 'iMaster User Management';
        $menu = 'User Management';
        $submenu = "New User";

        return view('pages.usermanage.usermanage-create', compact(
            'user',
            'title',
            'subtitle',
            'menu',
            'submenu',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $filename = $request->image->getClientOriginalName();
                $request->image->storeAs('images/profile', $filename, 'public');
            } else {
                $filename = 'default.png'; // Set a default image filename if no image is provided
            }

            $user = new User([
                'name' => $request->input('name'),
                'user_phone' => $request->input('user_phone'),
                'email' => $request->input('email'),
                'user_placebirth' => $request->input('user_placebirth'),
                'user_datebirth' => $request->input('user_datebirth'),
                'user_typecard' => $request->input('user_typecard'),
                'user_idcard' => $request->input('user_idcard'),
                'user_position' => $request->input('user_position'),
                'user_gender' => $request->input('user_gender'),
                'user_religion' => $request->input('user_religion'),
                'user_from' => $request->input('user_datebirth'),
                'password' => Hash::make($request->input('user_phone')),
                'image' => $filename, // Set the image filename
            ]);

            $user->save(); // Save the user to the database

            return redirect()->route('usermanage.index')->with('success', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('usermanage.index')->with('error', 'Terjadi kesalahan saat memperbarui profil.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findorFail($id);
        $title = 'iMaster';
        $subtitle = 'iMaster User Management';
        $menu = 'User Management';
        $submenu = "View User ". $user->name ;

        return view('pages.usermanage.usermanage-edit', compact(
            'user',
            'title',
            'subtitle',
            'menu',
            'submenu',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorFail($id);
        $title = 'iMaster';
        $subtitle = 'iMaster User Management';
        $menu = 'User Management';
        $submenu = "Edit User ". $user->name ;

        return view('pages.usermanage.usermanage-edit', compact(
            'user',
            'title',
            'subtitle',
            'menu',
            'submenu',
        ));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // $userId = Auth::id();
            $user = User::findOrFail($id); // Memanggil 'firstOrFail()' untuk mendapatkan objek user

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
            return redirect()->route('usermanage.index')->with('error', 'Terjadi kesalahan saat memperbarui profil.');
        }
        // Log::info('Photo Update:', ['image' => $imageName]);
        return redirect()->route('usermanage.index')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorFail($id);
        $user->delete();

        return redirect()->route('usermanage.index')->with('success', 'Data berhasil dihapus');
    }
}
