<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;



class FrontendHomeController extends Controller
{
    public function home()
    {
        return view('front.userinfoget');
    }

    public function StoreUserInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z ]+$/|max:255',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'mobile_no' => 'required|numeric|digits:10',
            'location' => 'required',
            'bus_unit' => 'required',
            'emp_id' => 'required',
        ]);

        
          if ($validator->fails())
          {
              $message = [];
              foreach($validator->errors()->getMessages() as $keys=>$vals)
              {
                 foreach($vals as $k=>$v)
                 {
                   $message[] =  $v;
                 }
              }

              return response()->json([
                  'status' => false,
                  'errors' => $validator->errors(),
                  'msg' => $message[0]
                  ]);
          }

          if (User::where('emp_id', '=', $request->emp_id)->count() > 0) {
            // echo "654641";exit;
            $user = User::where('emp_id', '=', $request->emp_id)->first();
            $data = ['exist'];
            return response()->json([
                'status' => true,
                'varia' => 'already',
                'user' => $user,
                'msg' => 'User Info Saved successfully',
            ]);
        
         }
         else{
        

          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->bus_unit = $request->bus_unit;
          $user->phone = $request->mobile_no;
          $user->location = $request->location;
          $user->emp_id = $request->emp_id;
          $user->save();
        
          
            return response()->json([
                'status' => true,
                'varia' => 'success',
                'msg' => 'User Info Saved successfully',
            ]);
         }
    }
}
