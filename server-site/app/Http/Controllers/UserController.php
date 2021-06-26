<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
   function addUser(Request  $request){
       $name= $request->input('name');
       $username= $request->input('username');
       $password= $request->input('password');
       $roll= $request->input('roll');
       $userCount= UserModel::Where('username',$username)->count();
       if ($userCount>0){
            return "exist";
       }
       else{
          $result= UserModel::insert(["fullname"=>$name, "username"=>$username, "roll"=>$roll, "lastactivity"=>"No Activity", "password"=>$password]);
          return $result;
       }
    }

   

   function SelectUser(){
      $result=UserModel::all();
      return  $result;



   }
   function deleteUser(Request $request){
    $id= $request->id;
    $result=UserModel::Where('id', $id)->delete();
    return  $result;





   }
   function updateUser(){
      $id= $request->input('id');
      $name= $request->input('name');
      $username= $request->input('username');
      $password= $request->input('password');
      $roll= $request->input('roll');
      $userCount=UserModel::Where('username',$username)->count(); 
      $result= UserModel::Where('id',$id)->update(["fullname"=>$name, "username"=>$username, "roll"=>$roll, "lastactivity"=>"No Activity", "password"=>$password]);

   }
}
