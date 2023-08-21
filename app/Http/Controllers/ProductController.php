<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;
use Validator;
use Auth;
use DataTables;
use DB;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $title = 'Product';

    
    public function index(Request $request)
    {
        //
       
        
        $data = Product::latest()->get();
         
        return view('admin.product.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $value = Category::get();
        $newdata['url'] = route('admin.product.store');
        $newdata['btn'] = "Save";
        $newdata['page_title'] = 'Create';
        $newdata['page_name'] = 'Create Product';
        return view('admin.product.create',compact('value', 'newdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required',
            'quantity' => 'required',
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // banner  store
        $product = new Product;
        $product->name =$request->name; 
        $product->price =$request->price; 
        $product->description =$request->description; 
        $product->category =$request->category; 
        $product->quantity =$request->quantity;
        if($request->hasFile('image'))
        {
        $image = 'product'.time().'.'.$request->image->extension();
        $request->image->move(public_path('/uploads/product'), $image);
        $image = "/uploads/product/".$image;
        $product->image =$image; 
        }
        if($request->status == 'on'){
            $status= 'Active';
       }else{
        $status = 'Inactive';
       }
        $product->status =$status; 
        $product->save();

        Session::flash('success', 'Product Create Successfully.');
        return Redirect::to("admin/product");
        
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
        
          $bannerdata = Product::find($id);


          return response()->json([
            'status' => true,
            'data' =>$bannerdata ,
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
        $value = Category::get();
        

        // $newdata['url'] = route('users/update');
        $post = Product::find($id);
        $newdata['btn'] = "Update";
        $newdata['url'] = route('admin.product.update',$id);
        $newdata['page_title'] = 'Edit';
        $newdata['page_name'] = 'Edit Product';
        return view('admin.product.create',compact('post', 'value', 'newdata'));
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
        //
       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        // banner  store
        $product = Product::find($id);
        $product->name =$request->name; 
        $product->price =$request->price; 
        $product->description =$request->description; 
        $product->category =$request->category; 
        $product->quantity =$request->quantity;
        if($request->hasFile('image'))
        {
        $image = 'product'.time().'.'.$request->image->extension();
        $request->image->move(public_path('/uploads/product'), $image);
        $image = "/uploads/product/".$image;
        $product->image =$image; 
        }
        if($request->status == 'on'){
            $status= 'Active';
       }else{
        $status = 'Inactive';
       }
        $product->status =$status; 
        $product->save();

        Session::flash('success', 'Product Update Successfully.');
        return Redirect::to("admin/product");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $banner = Product::find($id);
        if(isset($banner)){
            $image_path = public_path($banner->image);
    
            //echo $image_path;exit;
              if(File::exists($image_path)){
                  File::delete($image_path);
                }
                $banner->delete();
        }
       
        Session::flash('success', 'Product Delete Successfully.');
        return Redirect::to("admin/product");
    }
   
}
