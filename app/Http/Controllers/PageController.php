<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\SliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Page;
use Validator;
use File;
use App\Models\Slider;

class PageController extends Controller
{

    public function index(Request $request)
    {
    
       $data = Page::latest()->get();
         return view('admin.page.index',compact('data'));
    }


     public function store(Request $request)
    {

        if($request->isMethod('post')){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            
            'status' => 'required',
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // category  store
        $page = new Page;
        $page->name = $request->name;
        $page->number = $request->number;
        $page->title1 = $request->title1;
        $page->title2 = $request->title2;
        $page->title3 = $request->title3;
        $page->title4 = $request->title4;
        $page->short_describation = $request->short_describation;
        $page->meta_describation = $request->meta_describation;

        if($request->hasFile('image'))
        {
        $image = 'page'.time().'.'.$request->image->extension();
        $request->image->move(public_path('/uploads/category'), $image);
        $image = "/uploads/category/".$image;
        $page->image =$image; 
        }
       
        if($request->status == 'on'){
            $status= 'Active';
       }else{
        $status = 'Inactive';
       }
        $page->status =$status; 
        $page->save();



    }

    return redirect()->route('admin.page.show');
    }

    public function create()
{
    return view('admin.page.create');
}

    public function edit(Request $request, $id)
    {
        $data = Page::find($id);
        return view('admin.page.edit',['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        $data = Page::find($id);
       
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'number' => 'required',
                'status' => 'required',
            ]);
            if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
    
            $page = Page::find($id);
            $page->name = $request->name;
            $page->number = $request->number;
            $page->title1 = $request->title1;
            $page->title2 = $request->title2;
            $page->title3 = $request->title3;
            $page->title4 = $request->title4;    
            $page->short_describation = $request->short_describation;
            $page->meta_describation = $request->meta_describation;

        if($request->hasFile('image'))
        {
        $image = 'page'.time().'.'.$request->image->extension();
        $request->image->move(public_path('/uploads/category'), $image);
        $image = "/uploads/category/".$image;
        $page->image =$image; 
        }
        if($request->status == 'on'){
            $status= 'Active';
       }else{
        $status = 'Inactive';
       }
    
        $page->status =$status; 
        $page->save();
        return redirect()->route('admin.page.edit', ['id' => $id]);
        
    }
    return view('admin.page.edit',['data' => $data]);
 }

public function destroy($id)
{

    $page = Page::find($id);
    if(isset($page)){
        $image_path = public_path($page->image);

        //echo $image_path;exit;
          if(File::exists($image_path)){
              File::delete($image_path);
            }
            $page->delete();
    }
   
    return redirect()->route('admin.page.show')->with('success', 'Page deleted successfully.');
}
public function home()
{
    $pages = Page::where('number', 1)->get();
    $pages1 = Page::where('number', 2)->get();
    $sliders = Slider::latest()->get();
    $pages2 = Page::where('number', 5)->get();
    $pages3 = Page::where('number', 4)->get();
    $pages4 = Page::where('number', 3)->get();
    $pages5 = Page::where('number', 7)->get();
    $pages6 = Page::where('number', 8)->get();
    $pages7 = Page::where('number', 9)->get();
    return view('frontend.home',compact('pages','sliders','pages1','pages2','pages3','pages4','pages5','pages6','pages7') );
}
public function about()
{
    $pages2 = Page::where('number', 5)->get();
    $pages3 = Page::where('number', 4)->get();
    return view('frontend.about',compact('pages2','pages3'));
}
public function service()
{
    $pages2 = Page::where('number', 5)->get();
    $pages3 = Page::where('number', 4)->get();
    return view('frontend.service',compact('pages2','pages3'));
}
public function gallery()
{
    $pages2 = Page::where('number', 5)->get();
    $pages3 = Page::where('number', 4)->get();
    return view('frontend.gallery',compact('pages2','pages3'));
}
public function contact()
{
    $pages2 = Page::where('number', 5)->get();
    $pages3 = Page::where('number', 4)->get();
    return view('frontend.contact',compact('pages2','pages3'));
}

}