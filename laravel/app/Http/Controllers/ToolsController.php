<?php

namespace App\Http\Controllers;

use App\Models\Tool;

class ToolsController extends Controller
{
	public function index()
	{
		$tools = Tool::orderBy('title')->get();

		return view('tools.index', compact('tools'));
	}
}