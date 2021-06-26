<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CartController extends Controller{





    function AddCart(Request $request){
        $invoice_no=$request->input('invoice_no');
        $invoice_date=$request->input('invoice_date');
        $Product_name=$request->input('Product_name');
        $Product_qty=$request->input('Product_qty');
        $Product_unit_price=$request->input('Product_unit_price');
        $Product_total_price=$request->input('Product_total_price');
        $seller_name=$request->input('seller_name');
        $product_icon=$request->input('product_icon');
        $result=CategoryModel::insert([
            "invoice_no"=>$invoice_no,
            "invoice_date"=>$invoice_date,
            "product_name"=>$Product_name,
            "product_qty"=>$Product_qty,
            "product_unit_price"=>$Product_unit_price,
            "product_total_price"=>$Product_total_price,
            "seller_name"=>$seller_name,
            "product_icon"=>$product_icon,


        ]);



    }


    function CartList(Request $request){
        $invoice=$request->invoice;
        $result=CartModel::Where('invoice_no',$invoice)->get();
        return $result;
    }

    function RemoveCartList(Request $request){
        $id=$request->id;
        $result=CartModel::Where('id',$id)->delete();
        return $result;
    }
  function CartItemPlus(Request $request){

      $id=$request->id;
      $quantity=$request->quantity;
      $price=$request->price;
      $newQuantity=$quantity+1;
      $total_price=$newQuantity*$price;
      $result=CartModel::Where('id',$id)->update(['product_qty' => $newQuantity, 'product_total_price' => $total_price]);
      return $result;


  }

  function CartItemMinus(Request  $request){
      $id=$request->id;
      $quantity=$request->quantity;
      $price=$request->price;
      $newQuantity=$quantity-1;
      $total_price=$newQuantity*$price;
      $result=CartModel::Where('id',$id)->update(['product_qty' => $newQuantity, 'product_total_price' => $total_price]);
      return $result;


  }


}


