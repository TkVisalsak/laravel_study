<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Article;
use Illuminate\Http\Request;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Article::all();
        return view('articles.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::pluck('title', 'id');
        return view('articles.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles,title',
            'menu_id' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['title', 'menu_id', 'sub_title', 'content', 'description']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/articles'), $filename);
            $data['image'] = 'images/articles/' . $filename;
        }
        if (!isset($data['title']) || !empty($data['title'])) {
            $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        }

        Article::create($data);
        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Article::findOrFail($id);
        $menus = Menu::pluck('title', 'id');
        return view('articles.edit', compact('row', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Article::findOrFail($id);
        $request->validate([
            'title' => 'required|unique:articles,title,'.$id,
            'menu_id' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['title', 'menu_id', 'sub_title', 'content', 'description', 'slug']);
        if ($request->hasFile('image')) {
            if($row->image && file_exists($row->image)){
                unlink($row->image);
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/articles'), $filename);
            $data['image'] = 'images/articles/' . $filename;

        }
        if (!isset($data['title']) || !empty($data['title'])) {
            $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));
        }

        $row->update($data);
        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Article::findOrFail($id);
        if($row->image && file_exists($row->image)){
            unlink($row->image);
        }
        $row->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
