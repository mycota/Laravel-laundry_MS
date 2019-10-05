<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transid = request('transid');
        $pay_type = request('pay_type');
        $total = DB::table('detailorders')->where('transid', $transid)->sum('sub_total');
        // $orders = DB::table('detailorders')->where('transid', $id)->get();
        $split = explode('-', $transid);
        $custid = $split[0];
        $customer = Customer::findorfail($custid);
        $data = ['transid' => $transid, 'pay_type' => $pay_type, 'total' => $total, 'customer' => $customer];

        if ($pay_type == "Cash Payment") {
            return view('payments.cash')->with($data);
        }
        elseif ($pay_type == "Card Payment") {
            return view('payments.card')->with($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordersum = DB::table('orders')->where('transid', $id)->first();
        $due_date = $ordersum->due_date;
        $amount = $ordersum->total_amount;
        $pay = DB::table('payments')->where('transid', $id)->first();

        $pay_type = $pay->payment_mthd;

        $cust = explode('-', $id);
        $customertid = $cust[0];

        $orders = DB::table('detailorders')->where('transid', $id)->get();
                $date = date('d/m/Y',strtotime($ordersum->created_at)); 
                $duedate = date('d/m/Y',strtotime($due_date)); 
                $data = ['transid' => $id, 'customer' => Customer::findorfail($customertid), 'ordersum' => $ordersum, 'orders' => $orders, 'date' => $date, 'total' => $amount, 'due_date' => $duedate, 'pay_type' => $pay_type];

                return view('payments.reciept')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
