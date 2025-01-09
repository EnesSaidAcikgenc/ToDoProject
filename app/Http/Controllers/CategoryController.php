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

    public function edit($id, Request $request)
    {
        //where('SütunAdı','neAranıyor') iki parametrede aranır.
        //$c = categories::where('id', $id)->get();
        $c = categories::find($id);
        return view('panel.categories.update',compact('c'));
    }

    public function update(Request $request)
    {
        //dd('geldi');
        //$categorie = categories::find($id); bu parametre ile güncelleme yapacağın zaman kullanılır. yukarda update kısmının içine $id yazılır.

        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'is_active' => 'required|min:0|max:1|boolean',
            ],[
                'name.required' => 'Kategorinin isim alanı boş bırakılamaz.',
                'name.string' => 'Kategorinin isiminde olmaması gereken bir karakter kullanmayın. ',
                'name.max' => 'Kategorinin ismini biraz kısa tutunuz. ',
                'name.min' => 'Kategorinin ismini biraz uzun tutunuz. ',
                'is_active.required' => 'Kategorinin durumunu belirtmelisiniz.',
                'is_active.min' => 'Kategori en az 0 değerini alabilir.',
                'is_active.max' => 'Kategori en fazla 1 değerini alabilir.',
                'is_active.boolean' => 'Kategorinin durumuna bir karakterden farklı değer atamayınız .',
        ]);

        $categorie = categories::find($request->catID);
        if ($categorie != null){
            $categorie -> name = $request->input('name');
            $categorie -> is_active = $request->input('is_active');
            $categorie -> save();

            return redirect()->route('categories')->with(['success'=>'Kategori Başarıyla Güncellendi.']);
        }else{
            return redirect()->route('categories')->with(['error'=>'Bir hata oluştu lütfen tekrar deneyiniz.']);
        }

    }
}
