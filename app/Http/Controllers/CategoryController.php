<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = categories::all();
        return view('panel.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('panel.categories.create');
    }
    public function store(Request $request)
    {
        $category = new categories();
        $category -> name = $request->input('name');
        $category -> is_active = $request->input('is_active');
        $category -> save();

        return redirect()->route('categories')->with(['success' => 'Kategori Başarıyla Oluşturuldu.']);
    }
}
