<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\transaction;
use App\Models\Account;
use DB;

class studentController extends Controller
{
    //
    public $student = array( 
        array("B190930119","Akhjarkhyn","Tilyeu","19"),
        array("B190930040","Omirbyek","Sauletbai","19"),
        array("B190930111","Ganbaatar","Sh","19")
    );

    public function studentList(){
        $a = $this->student;
        return view("vstudent", compact('a')); 
    }

    public function getById($id){
        foreach($this->student as $a){
            if($a[0] == $id){
                return view("vinfo", compact('a'));
            } // 1r arga
        }
    }

    public function doSearch(Request $request){ 

        $validated = $request->validate([
            "sid" => 'required|size:10|regex:/(B)[0-9]{9}/',
        ]);
        
        foreach($this->student as $a){
            if($a[0] ==$request->sid){
                return view('search',compact('a'));
            }   
        }
        return view('search',['b' => 0]);
    }

    public function accInfo(){
        $acc = DB::table('accounts')->select('id','account_name','account_number','account_balance')->get();
        return view('account',['account'=>$acc]);
    }

    public function viewAccTrans($number){
        $transaction = DB::table('transaction')
        ->where('transaction_from',$number)
        ->orWhere('transaction_to',$number)
        ->get();
        return view('viewAccTransaction',['transaction'=>$transaction]);
    }

    public function createTrans(Request $request){
        
        $validated = $request->validate([
            "transactionFrom" => 'bail|required|size:6',
            "transactionTo" => 'required|size:6',
            "transactionAmount" => 'required|gt:0',
            "transactionDescription" => 'required',
        ]);

        $trans = new transaction();
        $trans->transaction_from = $request->transactionFrom; 
        $trans->transaction_to = $request->transactionTo; 
        $trans->transaction_amount = $request->transactionAmount; 
        $trans->transaction_description = $request->transactionDescription; 
        $trans->save();

        $account1 = Account::where('account_number',$trans->transaction_from)->first();
        if($account1 == null) {
            return view('transactionTab',["err" => 'Шилжүүлэх данс олдсонгүй' ]);
        }

        $account2 = Account::where('account_number',$trans->transaction_to)->first();
        if($account2 == null) {
            return view('transactionTab',["err" => 'Хүлээн авах данс олдсонгүй' ]);
        }

        if($account1->account_balance - $trans->transaction_amount > 0){
            $account1->account_balance =  $account1->account_balance - $trans->transaction_amount;
            $account1->save();
            $account2->account_balance =  $account2->account_balance + $trans->transaction_amount;
            $account2->save();
        } else {
            return view('transactionTab',["err" => 'Дансандах үлдэгдэл хүрэлцэхгүй байна' ]);
        }

    }
}
