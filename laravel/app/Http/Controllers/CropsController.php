<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropsController extends Controller
{
    /**
     * Display a listing of the crops.
     */
    public function index()
    {
        $crops = Crop::all();
        return view('crop.index', compact('crops'));
    }

    /**
     * Display a specific crop.
     */
    public function show(Crop $crop)
    {
        return view('crop.show', compact('crop'));
    }
}