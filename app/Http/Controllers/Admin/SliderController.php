<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(10);

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();

        $slider = new Slider;

        $slider->title = $validatedData['title'];
        $slider->description = $request->description;

        $uploadPath  = 'uploads/slider/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/slider/', $filename);
            $slider->image = $uploadPath . $filename;
        }

        $slider->is_active = $request->is_active == true ? '1' : '0';

        $slider->save();
        return redirect('/admin/slider')->with('success', '');
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
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderFormRequest $request, $id)
    {
        $validatedData = $request->validated();

        $slider = Slider::findOrFail($id);

        $slider->title = $validatedData['title'];
        $slider->description = $request->description;

        if ($request->hasFile('image')) {

            $uploadPath  = 'uploads/slider/';
            $path = 'uploads/slider/' . $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('uploads/slider/', $filename);
            $slider->image = $uploadPath . $filename;
        }

        $slider->is_active = $request->is_active == true ? '1' : '0';

        $slider->update();

        return redirect('/admin/slider')->with('message', 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $path = $slider->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $slider->delete();
        return redirect('/admin/slider')->with('message', 'Slider Deleted Successfully');
    }
}
