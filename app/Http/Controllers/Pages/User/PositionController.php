<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'iMaster';
        $subtitle = 'iMaster Position Management';
        $menu = 'Position Management';
        $submenu = 'Position Index';
        $submenu1 = 'New Position';
        $position = Position::all();

        return view('pages.usermanage.position-index', compact(
            'title',
            'subtitle',
            'menu',
            'submenu',
            'submenu1',
            'position',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('position.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $position = new Position([
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                'sallary' => $request->input('sallary'),
            ]);

            $position->save(); // Save the user to the database

            return redirect()->route('position.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('position.index')->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('position.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('position.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $position = Position::findOrFail($id); // Mengambil data posisi yang akan diupdate berdasarkan ID

            $position->name = $request->input('name'); // Update nama posisi
            $position->code = $request->input('code'); // Update kode posisi
            $position->sallary = $request->input('sallary'); // Update gaji posisi

            $position->save(); // Menyimpan perubahan data posisi ke database

            return redirect()->route('position.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('position.index')->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::findorFail($id);
        $position->delete();

        return redirect()->route('position.index')->with('success', 'Data berhasil dihapus');
    }
}
