<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddPageRequest;
use App\Http\Requests\RemoveImageRequest;
use App\Page;
use App\Product;
use App\SliderImage;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('home','blogList',  'page', 'product', 'products', 'getPageWithSlug');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = Page::havingStatus()->excludingDefault()->paginate(config('custom.ACTIVE_PAGES_PER_PAGE'));

        $inactive = Page::havingStatus(0)->excludingDefault()->paginate(config('custom.IN_ACTIVE_PAGES_PER_PAGE'));

        return view('admin.pages.list', ['activePages' => $active, 'inActivePages' => $inactive]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPageRequest $request)
    {
        $message = [
            'status' => 'success',
            'message' => "Page Save Successfully"
        ];


        if(!Page::where('title', str_slug($request->get('title')))->first()){
            $data = $request->all();
            if($request->hasFile('image')){
                $path = $request->file('image')->store('pages');
                $path = explode("/", $path)[1];

                $data['cover_image_path'] =  $path;
            }
            Page::create($data);
        }else{
            $message = [
                'status' => 'fail',
                'message' => "Page already exists!"
            ];
        }
        $request->session()->flash('status', $message['status']);
        $request->session()->flash('message', $message['message']);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit')->withPage($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddPageRequest $request, Page $page)
    {

        $message = [
            'status' => 'success',
            'message' => "Page Save Successfully"
        ];

        $data = $request->all();
        if($request->hasFile('image')){
            $path = $request->file('image')->store('pages');
            $path = explode("/", $path)[1];

            $data['cover_image_path'] =  $path;
        }
        if($page->isDefault()){
            unset($data['title']);
            unset($data['status']);
            $page->status = 1;
        }
        $page->update($data);

        $request->session()->flash('status', $message['status']);
        $request->session()->flash('message', $message['message']);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page, Request $request)
    {
        $message = ['status' => 'success', 'message' => 'Blog Deleted successfully'];
        if($page->isDefault()) {
            $message = ['status' => 'success', 'message' => "Can't Delete Web site Default Pages"];
            $request->session()->flash('status', $message['status']);
            $request->session()->flash('message', $message['message']);
            return redirect()->back();
        }
        $page->delete();
        $request->session()->flash('status', $message['status']);
        $request->session()->flash('message', $message['message']);

        return redirect()->back();
    }

    public function page($slug)
    {
        $page = Page::where('title', str_slug($slug))->first();
        if($page)
            return view('admin.pages.show')->withPage($page);

        return redirect()->back();
    }

    public function getPageWithSlug($slug)
    {
        $page = Page::where('title', str_slug($slug))->first();
        if($page)
            return view('page')
                ->withPage($page)
                ->withRecents(Page::recent()->get())
                ->withCategories($this->getMenu()['categories']);

        return redirect()->back();

    }

    public function setStatus(Page $page, Request $request)
    {
        $page->update(['status' => !$page->status]);
        return redirect()->back();
    }

    private function getMenu()
    {
        $products = Product::active()->havePhoto()->inRandomOrder()->get();
        $categories = Category::root()->active()->get();
        return [
            'products' => $products,
            'categories' => $categories
        ];
    }

    public function home()
    {
        $images = SliderImage::where('status', 1)->latest()->limit(3)->get();
        $page = Page::defaultPage(Page::HOME)->first();
        $products = Product::active()->havePhoto()->inRandomOrder()->limit(6)->get();

        return view('sample_layout')
            ->withImages($images)
            ->withPage($page)
            ->withProducts($products)
            ->withCategories($this->getMenu()['categories']);

    }

    public function admin()
    {
        return view('admin.home');
    }

    public function defaultPage($page_slug)
    {
        $page = Page::defaultPage($page_slug)->first();
        if(!$page)
            return redirect()->back();

        return view('admin.pages.show')->withPage($page);
    }

   /* public function homePage()
    {
        $page = Page::defaultPage(Page::HOME)->first();
            return view('admin.pages.show')->withPage($page);
    }

    public function aboutUsPage()
    {
        $page = Page::defaultPage(Page::ABOUT_US)->first();
        return view('admin.pages.show')->withPage($page);
    }

    public function contactUsPage()
    {
        $page = Page::defaultPage(Page::CONTACT_US)->first();
        return view('admin.pages.show')->withPage($page);
    }*/
    public function product(Product $product)
    {
        return view('product')
            ->withProduct($product)
            ->withCategories($this->getMenu()['categories']);
    }

    public function products(Category $category)
    {
        $products = $category->products()->active()->get();
        return view('products')
            ->withProducts($products)
            ->withCategories($this->getMenu()['categories']);
    }

    public function blogList()
    {
        $pages = Page::excludingDefault()->latest()->get();
        return view('blog_list')
            ->withPages($pages)
            ->withRecents(Page::recent()->get())
            ->withCategories($this->getMenu()['categories']);
    }

    public function removeImage(Page $page, RemoveImageRequest $request)
    {
        $message = [
            'status' => 'success',
            'message' => 'Page have no photo'
        ];
        if($page->cover_image_path){
            $page->cover_image_path = null;
            $page->save();
            $message['message'] = "Image removed";

        }
        $request->session()->flash('status', $message['status']);
        $request->session()->flash('message', $message['message']);
        return redirect()->back();

    }

}
