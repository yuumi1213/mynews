<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Plofile;

class PlofileController extends Controller
{
    public function index(Request $request)
    {
        $posts = Plofile::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('plofile.index', ['headline' => $headline, 'posts' => $posts]);
    }
}