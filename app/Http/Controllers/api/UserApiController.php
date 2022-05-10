<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Validators;

class UserApiController extends Controller
{
   public function showUsers($id=null){
      
           $users = User::find($id);
           return response()->json(['users' =>$users],200);
     
   }

   public function userSave(Request $request){

       if($request->ismethod('post')){
           $data = $request->all();
         
           $users = new User();
           $users->name = $data['name'];
           $users->email = $data['email'];
           $users->password = bcrypt($data['password']);
           $users->save();
           $message = 'Users Successfully add';
           return response()->json(['message' =>$message],201);
       }

        //    $users = new User();
        //    $users->name = $request['name'];
        //    $users->email = $request['email'];
        //    $users->password = bcrypt($request['password']);
        //    $users->save();
        //    $message = 'Users Successfully add';
        //    return response()->json(['message' =>$message],201);
          
   }
}
