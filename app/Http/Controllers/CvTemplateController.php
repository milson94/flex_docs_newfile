<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = []; // Fetch your template data here (e.g., from a database or config file)

        // Example using the same images as the welcome page
        for ($i = 1; $i <= 20; $i++) {
            $templates[] = [
                'id' => $i,
                'image_url' => asset("images/templates/template{$i}.png"),
            ];
        }


        return view('templates.index', compact('templates'));
    }
}