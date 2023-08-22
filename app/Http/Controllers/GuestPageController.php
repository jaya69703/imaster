<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestPageController extends Controller
{

    public function index()
    {
        $title = "iMaster";
        $menu = "Artikel";
        $submenu = "Artikel Terbaru";

        return view('pages.article.article-index', compact(
            'title',
            'menu',
            'submenu',
        ));
    }


}
