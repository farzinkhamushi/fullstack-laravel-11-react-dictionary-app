<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $definition = Definition::all();
        $synonym = Synonym::all();
        $antonym = Antonym::all();
        $word = Word::all();
        return view('admin.index', compact('definition', 'synonym', 'antonym', 'word'));
    }

}
