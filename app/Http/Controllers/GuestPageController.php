<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class GuestPageController extends Controller
{

    public function index()
    {
        $title = "iMaster";
        $menu = "Component";
        $submenu = "Widget Creator";
        $status = Status::all();

        return view('pages.article.article-index', compact(
            'title',
            'menu',
            'submenu',
            'status',
        ));
    }

    public function saveStatus(Request $request)
    {
        try {

            if ($request->hasFile('image')) {
                $filename = $request->image->getClientOriginalName();
                $request->image->storeAs('images/status', $filename, 'public');
            } else {
                $filename = null; // Saya mau ini tidak ada isinya atau Null
            }

            $validator = Validator::make($request->all(), [
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
                'content' => 'required',
            ]);

            if($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $status = Status::create([
                'user_id' => Auth::user()->id,
                'image'   => $filename,
                'content'   => $request->input('content'),
            ]);

            return redirect()->route('guest-page.index')->with('success', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('guest-page.index')->with('error', 'Terjadi kesalahan saat memperbarui profil.');
        }



    }

    public function destroy(string $id)
    {
        $user = Status::findorFail($id);
        $user->delete();

        return redirect()->route('guest-page.index')->with('success', 'Data berhasil dihapus');
    }


}
