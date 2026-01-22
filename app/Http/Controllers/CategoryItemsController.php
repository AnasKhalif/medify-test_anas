<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryItem;

class CategoryItemsController extends Controller
{
    public function index()
    {
        return view('category_items.index.index');
    }

    public function search(Request $request)
    {
        $nama = $request->nama;
        $kode = $request->kode;

        $data_search = CategoryItem::query();

        if (!empty($nama)) $data_search = $data_search->where('name', 'LIKE', '%' . $nama . '%');
        if (!empty($kode)) $data_search = $data_search->where('kode', $kode);

        $data_search = $data_search->withCount('masterItems')
            ->orderBy('id')
            ->get();

        return json_encode([
            'status' => 200,
            'data' => $data_search
        ]);
    }

    public function formView($method, $id = 0)
    {
        if ($method == 'new') {
            $item = [];
        } else {
            $item = CategoryItem::find($id);
        }
        $data['item'] = $item;
        $data['method'] = $method;
        return view('category_items.form.index', $data);
    }

    public function singleView($id)
    {
        $category = CategoryItem::with('masterItems')->find($id);
        $data['category'] = $category;
        $data['masterItems'] = $category->masterItems;
        return view('category_items.single.index', $data);
    }

    public function formSubmit(Request $request, $method, $id = 0)
    {
        if ($method == 'new') {
            $data_item = new CategoryItem;
            $kode = CategoryItem::count('id');
            $kode = $kode + 1;
            $kode = 'CAT-' . str_pad($kode, 3, '0', STR_PAD_LEFT);
        } else {
            $data_item = CategoryItem::find($id);
            $kode = $data_item->kode;
        }

        $data_item->name = $request->name;
        $data_item->kode = $kode;
        $data_item->save();

        return redirect('category-items');
    }

    public function delete($id)
    {
        CategoryItem::find($id)->delete();
        return redirect('category-items');
    }
}
