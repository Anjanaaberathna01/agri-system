<?php

namespace App\Http\Controllers;

use App\Models\Fertilizer;

class FertilizersController extends Controller
{
    public function index()
    {
        $fertilizers = Fertilizer::orderBy('title')->get();

        return view('fertilizers.index', compact('fertilizers'));
    }
}