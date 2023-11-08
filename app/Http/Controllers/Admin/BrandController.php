<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandFormRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy("id", "DESC")->paginate(10);
        return view("admin.brands.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.brands.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandFormRequest $request)
    {
        $validatedData = $request->validated();

        $brand = new Brand;
        $brand->name = $validatedData["name"];
        $brand->slug = $validatedData["slug"];
        $brand->is_active = $request->is_active == true ? '1' : '0';

        $brand->save();

        return redirect('/admin/brand')->with('message', 'Brand Added Successfully');
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
        $brand = Brand::find($id);

        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandFormRequest $request, $brand)
    {
        $validatedData = $request->validated();

        $brand = Brand::findOrFail($brand);
        $brand->name = $validatedData["name"];
        $brand->slug = $validatedData["slug"];
        $brand->is_active = $request->is_active == true ? '1' : '0';

        $brand->update();

        return redirect('/admin/brand')->with('message', 'Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect('/admin/brand')->with('message', 'Brand Deleted Successfully');
    }
}
