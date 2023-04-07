<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //upload image
         $image = $request->file('image');
         $image->storeAs('public/sliders/', $image->hashName());
 
         //save to DB
         Slider::create([
             'url'   => $request->url,
             'image' => $image->hashName(),
         ]);
 
         return redirect()->route('slider.index')->with([Alert::Success('Success', 'Message Success')]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {

        $this->validate($request, [
            
        ]);

        if ($request->file('image') == '') {

            $slider = Slider::findOrFail($slider->id);
            $slider->update([
                'url' => $request->url,
                
            ]);
        } else {

            Storage::disk('local')->delete('public/sliders/' . basename($slider->image));

            $image = $request->file('image');
            $image->storeAs('public/sliders/' , $image->hashName());

            $slider = Slider::findOrFail($slider->id);
            $slider->update([
                'url' => $request->url,
                'image' => $image->hashName(),
            ]);
        }

        return redirect()->route('category.index')->with([
            Alert::Success('Success', 'Berhasil diupdate')
        ]);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
