<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon;
use App\Models\WebSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Spatie\Backup\BackupDestination\Backup;
use Spatie\Backup\BackupDestination\BackupCollection;
use Spatie\Backup\BackupDestination\BackupDestinationFactory;


class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'iMaster';
        $subtitle = 'iMaster Web Settings';
        $menu = 'Web Settings';
        $submenu = 'Default Settings';
        $website = WebSetting::find(1);


        // dd($website->web_name);
        return view('pages.web.web-index', compact(
            'title',
            'subtitle',
            'menu',
            'submenu',
            // 'user',
            'website',
        ));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // $webId = Auth::id();
            $web = WebSetting::findOrFail($id); // Memanggil 'firstOrFail()' untuk mendapatkan objek user

            if($request->hasFile('web_logo')){
                $oldPhoto = $web->web_logo;

                if ($oldPhoto !== 'default.png' && Storage::disk('public')->exists('images/logo/' . $oldPhoto)) {
                    Storage::disk('public')->delete('images/logo/' . $oldPhoto);
                }

                $filename = $request->web_logo->getClientOriginalName();
                $request->web_logo->storeAs('images/logo',$filename,'public');
                $web->update(['web_logo' => $filename]);
            }

            // Update atribut lain
            $web->update([
                'web_name' => $request->input('web_name'),
                'web_dev' => $request->input('web_dev'),
            ]);

            $web->save(); // Menyimpan perubahan ke database

        } catch (\Exception $e) {
            return redirect()->route('web.index')->with('error', 'Terjadi kesalahan saat memperbarui website.');
        }
        // Log::info('Photo Update:', ['image' => $imageName]);
        return redirect()->route('web.index')->with('success', 'Website berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function DownloadDB()
    {
        $backupName = request('backup_name');

        $backup = BackupDestinationFactory::createFromArray(config('backup'))->backupByName($backupName);

        if ($backup) {
            return response()->download($backup->path());
        } else {
            return redirect()->back()->with('error', 'Backup not found.');
        }
    }
}
