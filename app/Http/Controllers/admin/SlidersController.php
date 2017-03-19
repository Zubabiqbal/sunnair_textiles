<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\AddSliderImageRequest;
use App\Http\Requests\UpdateSliderImageRequest;
use App\SliderImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SlidersController extends Controller
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
        return view('admin.slider.index', ['images' => SliderImage::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddSliderImageRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddSliderImageRequest $request)
    {
        $path = $request->file('slider')->store('photoes');
        $path = explode("/", $path)[1];
        SliderImage::create( array_merge($request->all(), ['path' => $path] ));
        $this->setAlertMessages($request);
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
        $image = SliderImage::findOrFail($id);
        return view('admin.slider.show')->withImage($image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = SliderImage::findOrFail($id);
        return view('admin.slider.edit')->withImage($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param SliderImage $sliderImage
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(UpdateSliderImageRequest $request, SliderImage $sliderImage)
    {
        $path = $sliderImage->path;
        if($request->hasFile('slider')){
            $path = $request->file('slider')->store('photoes');
            $path = explode("/", $path)[1];
        }

        $data = array_merge($request->all(), ['path' => $path]);
        $sliderImage->update($data);
        $this->setAlertMessages($request);
        return view('admin.slider.show')->withImage($sliderImage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SliderImage $sliderImage
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(SliderImage $sliderImage)
    {
        $sliderImage->delete();
        return redirect()->back();
    }

    /**
     * set slider image active/in-active
     *
     * @param SliderImage $sliderImage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setStatus(SliderImage $sliderImage)
    {
        $sliderImage->update(['status' => !$sliderImage->status]);
        return redirect()->back();
    }
}
