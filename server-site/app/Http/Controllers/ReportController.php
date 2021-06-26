<?php

namespace App\Http\Controllers;

use App\Models\TransectionModel;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function TransactionList(){
        $result=  TransectionModel::orderBy('id','desc')->get();
        return  $result;
    }

    function TransactionListByDate(Request $request){

        $result=  TransectionModel::orderBy('id','desc')->get();
        return  $result;
    }

}
