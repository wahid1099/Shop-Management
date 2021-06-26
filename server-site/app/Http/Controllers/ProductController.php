<?php

namespace App\Http\Controllers;


use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //adding data product Table
    function AddProduct(Request  $request){
        $Product_name= $request->input('Product_name');
        $Product_code=time();
        $Product_price=$request->input('Procut_price');
        $Product_category=$request->input('Procut_category');
        $Product_remarks=$request->input('Procut_remark');
        $product_icon=$request->file('product_icon')->store('public');
        $code= time();
        $result= ProductModel::insert([
            'product_name'=>$Product_name,
            'product_code'=>$Product_code,
            'product_icon'=>$product_icon,
            'product_price'=>$Product_price,
            'product_category'=>$Product_category,
            'product_remarks'=>$Product_remarks,


            ]);
        return $result;
    }






//Deleting Product
    function  DeleteProduct(Request $request){

        $id=$request->id;
        $product_icon=ProductModel::Where('id',$id)->get(['product_icon']);
        Storage::delete($product_icon[0]['product_icon']);
        $result=ProductModel::Where('id',$id)->delete();
        return $result;



    }
//select Product from database
    function  SelectProduct(){
        $result=ProductModel::all();
        return $result;

    }
    //updateing product from databse with image
    function  UpdateProductWithImage(Request  $request){
            $id=$request->input('id');
        // Old Image Delete
        $product_icon= ProductModel::Where('id',$id)->get(['product_icon']);
        Storage::delete($product_icon[ 0]['product_icon']);
        //New Image UploAD
        $product_icon= $request->file('product_icon')->store('public');
        $product_name= $request->input('product_name');
        $product_price=  $request->input('product_price');
        $product_category= $request->input('product_category');
        $product_remarks= $request->input('product_remarks');

        $result=CategoryModel::Where('id',$id)->update([
            'product_name'=>$product_name,
            'product_icon'=>$product_icon,
            'product_price'=>$product_price,
            'product_category'=>$product_category,
            'product_remarks'=>$product_remarks,
            ]);
        return $result;


    }
    //updating product wihout image
    function  UpdateProductWithoutImage(Request $request){
        $id= $request->input('id');
        $product_name= $request->input('product_name');
        $product_price=  $request->input('product_price');
        $product_category= $request->input('product_category');
        $product_remarks= $request->input('product_remarks');

        $result= ProductModel::Where('id', $id)->update([
            "product_name"=>$product_name,
            "product_price"=>$product_price,
            "product_category"=>$product_category,
            "product_remarks"=>$product_remarks,
        ]);
        return $result;


    }
//SelectProductByCategory for showing product in front end by category
    function SelectProductByCategory(Request $request){
        $Category=$request->Category;
        $result=ProductModel::where('product_category',$Category)->get();
        return $result;

    }

}
