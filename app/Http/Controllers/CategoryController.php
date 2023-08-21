<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use Validator;
use Auth;
use DataTables;
use DB;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $title = 'Category';
    public function index(Request $request)
    {
        
        $data = Category::latest()->get();
        return view('admin.category.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newdata['url'] = route('admin.category.store');
        $newdata['btn'] = "Save";
        $newdata['page_title'] = 'Create';
        $newdata['page_name'] = 'Create Category';
        return view('admin.category.create',compact('newdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());exit;
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // category  store
        $category = new Category;
        $category->name =$request->category_name;
        $category->description =$request->description;
        $category->meta_title =$request->category_name;
        $category->meta_description =$request->description;
        $category->meta_keyword =$request->category_name;

        if($request->hasFile('image'))
        {
        $image = 'category'.time().'.'.$request->image->extension();
        $request->image->move(public_path('/uploads/category'), $image);
        $image = "/uploads/category/".$image;
        $category->image =$image; 
        }
        if($request->status == 'on'){
            $status= 'Active';
       }else{
        $status = 'Inactive';
       }
        $category->status =$status; 
        $category->save();
        Session::flash('success', 'Category Create Successfully.');
        return Redirect::to("admin/category");
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
        $category = Category::find($id);
      //   $data['title'] = $this->title;

        return response()->json([
          'status' => true,
          'data' =>$category ,
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
       
        // $newdata['url'] = route('users/update');
        $post = Category::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.category.update',$id);
        $newdata['page_title'] = 'Edit';
        $newdata['page_name'] = 'Edit User';
        return view('admin.category.create',compact('post', 'newdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // print_r($request->name);exit;
        // $idd = base64_decode($id);
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // category  Update
        $category = Category::find($id);

        $category->name =$request->category_name;
        $category->description =$request->description;
        $category->meta_title =$request->category_name;
        $category->meta_description =$request->description;
        $category->meta_keyword =$request->category_name;


        if($request->hasFile('image'))
        {
        $image = 'category'.time().'.'.$request->image->extension();
        $request->image->move(public_path('/uploads/category'), $image);
        $image = "/uploads/category/".$image;
        $category->image =$image; 
        }
        if($request->status == 'on'){
            $status= 'Active';
       }else{
        $status = 'Inactive';
       }
       dd($request->status);
        $category->status =$status; 
        $category->save();

        Session::flash('success', 'Category Update Successfully.');
        return Redirect::to("admin/category");
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
    
        $category = Category::find($id);
        if(isset($category)){
            $image_path = public_path($category->image);
    
            //echo $image_path;exit;
              if(File::exists($image_path)){
                  File::delete($image_path);
                }
                $category->delete();
        }
       
        Session::flash('success', 'Category Delete Successfully.');
        return Redirect::to("admin/category");
    }
}
