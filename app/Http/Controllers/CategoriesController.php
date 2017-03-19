<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::root()->paginate(config('custom.CATEGORIES_PER_PAGE'));
        return view('admin.categories.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $rootCategories = Category::root()->get();
        return view('admin.categories.edit')->withCategory($category)->withCategories($rootCategories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddCategoryRequest $request, Category $category)
    {
        $data = $request->all();
        $category->parent_id = ($request->has('category_id') && ($request->get('category_id')) != $category->parent_id ) ? $request->get('category_id') : $category->parent_id;
        $category->update($data);
        $this->setAlertMessages($request);

        return redirect()->to('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Request $request)
    {
        if(!$category->isChild()){
            $this->setAlertMessages($request, 'fail', 'Root Category Cannot be deleted');
            return redirect()->back();
        }
        $category->children()->delete();
        $category->delete();
        $this->setAlertMessages($request);
        return redirect()->back();
    }

    public function setStatus(Category $category, Request $request)
    {
        $category->update(['status' => !$category->status]);
        $this->setAlertMessages($request);
        return redirect()->back();
    }

    public function createChild(Category $category, Request $request)
    {
        return view('admin.categories.create')->withCategory($category);
    }

    public function saveChild(Category $category, AddCategoryRequest $request)
    {
        $category->children()->create($request->all());
        $this->setAlertMessages($request);
        return redirect()->back();
    }

}
