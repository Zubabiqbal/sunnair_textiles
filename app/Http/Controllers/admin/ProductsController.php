<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, Request $request)
    {
        return view("admin.products.list")
            ->withProducts($category->products)
            ->withCategory($category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Category $category, Request $request)
    {
        if(!$category->isChild()){
            $this->setAlertMessages($request, 'fail','Root Category Cannot have products, please Add Sub Category' );

            return redirect('admin/category');

        }
        return view('admin.products.create')->withCategory($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Category $category
     * @param AddProductRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Category $category, AddProductRequest $request)
    {
        if (!$category->isChild()) {
            $this->setAlertMessages($request, 'fail', 'Root Category Cannot have products, please Add Sub Category');
            return redirect()->back();
        }
        $path = $request->file('image')->store('products');
        $path = explode("/", $path)[1];
        $category->products()->create( array_merge($request->all(), ['path' => $path] ));

        $this->setAlertMessages($request, 'success', 'Product Saved Successfully' );

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Product $product)
    {
        return view('admin.products.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Product $product)
    {
        return view('admin.products.edit')
            ->withCategory($category)
            ->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @param Product $product
     * @param EditProductRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category, Product $product, EditProductRequest $request)
    {
        $data = $request->all();
        $path = $product->path;
        if($request->hasFile('image')) {

            $path = $request->file('image')->store('products');
            $path = explode("/", $path)[1];
        }
        $data['path'] = $path;
        if($request->has('category_id'))
            $product->category_id = $request->get('category_id');
        $product->update($data);
        $this->setAlertMessages($request);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Product $product)
    {
        $product->delete();
        return redirect()->back();
    }


    public function setStatus(Category $category, Product $product, Request $request)
    {
        $product->update(['status' => !$product->status]);
        return redirect()->back();
    }
}
