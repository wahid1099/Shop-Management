<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\TransectionModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class DahsBoardController extends Controller
{
    function CoutProduct()
    {
        return   ProductModel::Count();


    }

    function CountCategory()
    {
        return CategoryModel::count();
    }

    function CountTransection()
    {
        return TransectionModel::count();
    }
    function CountTotalIncome(){
        $Transaction= TransectionModel::all();
        $TotalIncome=0;
        foreach ($Transaction as $TransactionList){
            $TotalIncome=$TotalIncome+$TransactionList['product_total_price'];
        }
        return $TotalIncome;
    }


    function IncomeLast7Days(){

        date_default_timezone_set('Asia/Dhaka');


        // Day 1
        $myDate1 = date('m/d/Y');
        $Transaction1= TransectionModel::where('invoice_date',$myDate1)->get();
        $TotalIncome1=0;
        foreach ($Transaction1 as $TransactionList1){
            $TotalIncome1=$TotalIncome1+$TransactionList1['product_total_price'];
        }




        // Day 2
        $myDate2 = date("m/d/Y", strtotime("-1 day"));
        $Transaction2= TransectionModel::where('invoice_date',$myDate2)->get();
        $TotalIncome2=0;
        foreach ($Transaction2 as $TransactionList2){
            $TotalIncome2=$TotalIncome2+$TransactionList2['product_total_price'];
        }


        // Day 3
        $myDate3 = date("m/d/Y", strtotime("-2 day"));
        $Transaction3= TransectionModel::where('invoice_date',$myDate3)->get();
        $TotalIncome3=0;
        foreach ($Transaction3 as $TransactionList3){
            $TotalIncome3=$TotalIncome3+$TransactionList3['product_total_price'];
        }

        // Day 4
        $myDate4 = date("m/d/Y", strtotime("-3 day"));
        $Transaction4= TransectionModel::where('invoice_date',$myDate4)->get();
        $TotalIncome4=0;
        foreach ($Transaction4 as $TransactionList4){
            $TotalIncome4=$TotalIncome4+$TransactionList4['product_total_price'];
        }

        // Day 5
        $myDate5 = date("m/d/Y", strtotime("-4 day"));
        $Transaction5= TransectionModel::where('invoice_date',$myDate5)->get();
        $TotalIncome5=0;
        foreach ($Transaction5 as $TransactionList5){
            $TotalIncome5=$TotalIncome5+$TransactionList5['product_total_price'];
        }


        // Day 6
        $myDate6 = date("m/d/Y", strtotime("-5 day"));
        $Transaction6 = TransectionModel::where('invoice_date',$myDate6)->get();
        $TotalIncome6=0;
        foreach ($Transaction6 as $TransactionList6){
            $TotalIncome6=$TotalIncome6+$TransactionList6['product_total_price'];
        }


        // Day 7
        $myDate7 = date("m/d/Y", strtotime("-6 day"));
        $Transaction7 = TransectionModel::where('invoice_date',$myDate7)->get();
        $TotalIncome7=0;
        foreach ($Transaction7 as $TransactionList7){
            $TotalIncome7=$TotalIncome7+$TransactionList7['product_total_price'];
        }


        $arr = array(
            array(
                "t_date" => $myDate1,
                "income" => $TotalIncome1
            ),
            array(
                "t_date" => $myDate2,
                "income" => $TotalIncome2
            ),
            array(
                "t_date" => $myDate3,
                "income" => $TotalIncome3
            ),
            array(
                "t_date" => $myDate4,
                "income" => $TotalIncome4
            ),
            array(
                "t_date" => $myDate5,
                "income" => $TotalIncome5
            ),
            array(
                "t_date" => $myDate6,
                "income" => $TotalIncome6
            ),
            array(
                "t_date" => $myDate7,
                "income" => $TotalIncome7
            )
        );


        return $arr;
    }


    function RecentTransactionList(){
        $result=  TransectionModel::orderById('id','desc')->limit(20)->get();
        return  $result;
    }




}


