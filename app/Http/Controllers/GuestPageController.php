<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestPageController extends Controller
{
    public function index()
    {
        $title = "imFeels";
        $menu = "Company";
        $submenu = "Struktur Organisasi";

        return view('pages.struktur-organisasi', compact(
            'title',
            'menu',
            'submenu',
        ));
    }

    public function Article()
    {
        $title = "imFeels";
        $menu = "Artikel";
        $submenu = "Artikel Terbaru";

        return view('pages.article.article-index', compact(
            'title',
            'menu',
            'submenu',
        ));
    }
}
