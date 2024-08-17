<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', category::class);

        $categories = Category::paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', category::class);

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->only('name'));

        return to_route('categories.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        $this->authorize('view', category::class);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        $this->authorize('update', category::class);

        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $updateCityRequest, Category $category)
    {
        $category->update($updateCityRequest->only('name'));
        return to_route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete', category::class);
        $category->delete();

        return to_route('categories.index')->with('Danger', 'Category deleted successfully');
    }

    public function trashed()
    {
        $this->authorize('trashed', category::class);

        $categories = Category::onlyTrashed()->paginate(10);

        return view('admin.categories.trash', compact('categories'));
    }

    public function restore(string $id)
    {
        $this->authorize('restore', Category::class);

        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        return to_route('categories.index')->with('success', 'Category restored successfully');
    }

    public function forceDelete(string $id)
    {
        $this->authorize('forceDelete', Category::class);

        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

        return to_route('categories.index')->with('Danger', 'Category deleted permanently');
    }
}
