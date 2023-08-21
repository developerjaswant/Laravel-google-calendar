<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;
use Validator;
use File;

class SliderController extends Controller
{

    public function index(Request $request)
    {
    
       $data = Slider::latest()->get();
         return view('admin.slider.index',compact('data'));
    }


     public function store(Request $request)
    {

        if($request->isMethod('post')){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'short_describation' => 'required',
             'meta_describation' => 'required',

            'status' => 'required',
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // category  store
        $slider = new Slider;
        $slider->name = $request->name;
        $slider->short_describation = $request->short_describation;
        $slider->meta_describation = $request->meta_describation;

        if($request->hasFile('image'))
        {
        $image = 'slider'.time().'.'.$request->image->extension();
        $request->image->move(public_path('/uploads/category'), $image);
        $image = "/uploads/category/".$image;
        $slider->image =$image; 
        }
        if($request->status == 'on'){
            $status= 'Active';
       }else{
        $status = 'Inactive';
       }
        $slider->status =$status; 
        $slider->save();



    }

    return redirect()->route('admin.slider.show');
    }
    
public function create()
{
    return view('admin.slider.create');
}

    public function edit(Request $request, $id)
    {
        $data = Slider::find($id);
        return view('admin.slider.edit',['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        $data = Slider::find($id);
       
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'short_describation' => 'required',
                'meta_describation' => 'required',
                'status' => 'required',
            ]);
            if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
    
            $slider = Slider::find($id);
            $slider->name =$request->name;
            $slider->short_describation = $request->short_describation;
            $slider->meta_describation = $request->meta_describation;

        if($request->hasFile('image'))
        {
        $image = 'slider'.time().'.'.$request->image->extension();
        $request->image->move(public_path('/uploads/category'), $image);
        $image = "/uploads/category/".$image;
        $slider->image =$image; 
        }
        if($request->status == 'on'){
            $status= 'Active';
       }else{
        $status = 'Inactive';
       }
    
        $slider->status =$status; 
        $slider->save();
        return redirect()->route('admin.slider.edit', ['id' => $id]);
        
    }
    return view('admin.slider.edit',['data' => $data]);
 }

public function destroy($id)
{

    $slider = Slider::find($id);
    if(isset($slider)){
        $image_path = public_path($slider->image);

        //echo $image_path;exit;
          if(File::exists($image_path)){
              File::delete($image_path);
            }
            $slider->delete();
    }
   
    Session::flash('success', 'Category Delete Successfully.');
    return Redirect::to("admin/slider");
}
public function home()
{
    $data = Slider::latest()->get();

    return view('frontend.home', ['data' => $data]);
}
}

