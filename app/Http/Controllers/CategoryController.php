<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        
        $this->authorize('viewAny', Category::class);

        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    
    public function create()
    {
        $this->authorize('create', Category::class);

        return view('categories.create');
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    
    public function show(Category $category)
    {
        $this->authorize('view', $category);
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('categories.edit', compact('category'));
    }

    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->name = $request->input('name');

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}