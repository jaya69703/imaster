<?php

namespace App\Http\Controllers\Pages\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Overtimes;
use Auth;

class OvertimesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'iMaster';
        $subtitle = 'iMaster Overtimes Store';
        $menu = 'Overtimes Management';
        $submenu = 'Overtimes Index';
        $overtimes = Overtimes::all();

        return view('pages.usermanage.overtimes-index', compact(
            'title',
            'subtitle',
            'menu',
            'submenu',
            'overtimes',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'iMaster';
        $subtitle = 'iMaster Overtimes Store';
        $menu = 'Overtimes Management';
        $submenu = 'Store Overtimes';
        $overtimes = Overtimes::all();

        return view('pages.usermanage.overtimes-create', compact(
            'title',
            'subtitle',
            'menu',
            'submenu',
            'overtimes',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('overtime_proof')) {
                $filename = $request->overtime_proof->getClientOriginalName();
                $request->overtime_proof->storeAs('images/overtime_proof', $filename, 'public');
            } else {
                $filename = 'default.png'; // Set a default image filename if no image is provided
            }

            $overtimes = new Overtimes([
                'user_id' => Auth::id(),
                'overtime_date' => $request->input('overtime_date'),
                'overtime_start' => $request->input('overtime_start'),
                'overtime_end' => $request->input('overtime_end'),
                'overtime_desc' => $request->input('overtime_desc'),
                'overtime_proof' => $filename, // Set the image filename
            ]);

            $overtimes->save(); // Save the user to the database

            return redirect()->route('overtimes.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('overtimes.index')->with('error', 'Terjadi kesalahan saat menambahkan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('overtimes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('overtimes.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $overtimes = Overtimes::findOrFail($id);

            $overtimes->update([
                'overtime_stat' => $request->input('overtime_stat'),
            ]);

            $overtimes->save();

            return redirect()->route('overtimes.index')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('overtimes.index')->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $overtimes = Overtimes::findorFail($id);
        $overtimes->delete();

        return redirect()->route('overtimes.index')->with('success', 'Data berhasil dihapus');
    }
}
