<?php

namespace App\Http\Controllers;

use App\Models\Elements;

class ElementsController extends Controller
{
    public function index()
    {
        $elements = Elements::inRandomOrder()->first();
        return view('pages.elements', ['elements' => $elements]);
    }

    public function download()
    {
        $path = public_path().'/json/elements-api.json';
        $header = ['Content-Type' => 'application/json'];
        return response()->download($path, 'elements-api.json', $header);
    }
}
