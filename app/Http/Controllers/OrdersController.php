<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use App\Customer;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = DB::table('orders')->sum('total_amount');
        return view('orders_sumry.index')->with(['orders' => Order::paginate(5), 'total' => $total, 'title' => 'All orders']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = request('user_id');
        $transid = request('transid');
        $custid = request('custid');
        $amount = request('total_amount');
        $duedate = request('duedate');
        $pay_type = request('pay_type');
        $total_item = DB::table('detailorders')->where('transid', $transid)->sum('quantity');

        if ($pay_type == "Cash Payment") {
            $insertordersumry = DB::table('orders')->insert(['user_id' => $user_id, 'transid' => $transid, 'customer_id' => $custid, 'due_date' => $duedate, 'total_item' => $total_item, 'total_amount' => $amount, 'order_status' => 'Pending']);

            $ordersum = DB::table('orders')->where('transid', $transid)->first();
            // dd($ordersum->id);

            $insertpayment = DB::table('payments')->insert(['user_id' => $user_id, 'customer_id' => $custid, 'order_id' => $ordersum->id, 'payment_id' => $transid, 'transid' => $transid, 'total_amount' => $amount, 'payment_mthd' => $pay_type]);
            if ($insertordersumry and $insertpayment) {
                
                $orders = DB::table('detailorders')->where('transid', $transid)->get();
                $date = date('d/m/Y',strtotime($ordersum->created_at)); 
                $duedate = date('d/m/Y',strtotime($duedate)); 
                $data = ['success'=>'Order added print invoice for customer.', 'transid' => $transid, 'customer' => Customer::findorfail($custid), 'ordersum' => $ordersum, 'orders' => $orders, 'date' => $date, 'total' => $amount, 'due_date' => $duedate, 'pay_type' => $pay_type];

                return view('payments.reciept')->with($data);
            }
            
        }
        elseif ($pay_type == "Card Payment") {
            $insertordersumry = DB::table('orders')->insert(['user_id' => $user_id, 'transid' => $transid, 'customer_id' => $custid, 'due_date' => $duedate, 'total_item' => $total_item, 'total_amount' => $amount, 'order_status' => 'Pending']);

            $ordersum = DB::table('orders')->where('transid', $transid)->first();
            // dd($ordersum->id);

            $insertpayment = DB::table('payments')->insert(['user_id' => $user_id, 'customer_id' => $custid, 'order_id' => $ordersum->id, 'payment_id' => request('trans_id'), 'transid' => $transid, 'total_amount' => $amount, 'payment_mthd' => $pay_type]);
            if ($insertordersumry and $insertpayment) {
                
                $orders = DB::table('detailorders')->where('transid', $transid)->get();
                $date = date('d/m/Y',strtotime($ordersum->created_at)); 
                $duedate = date('d/m/Y',strtotime($duedate)); 
                $data = ['success'=>'Order added print invoice for customer.', 'transid' => $transid, 'customer' => Customer::findorfail($custid), 'ordersum' => $ordersum, 'orders' => $orders, 'date' => $date, 'total' => $amount, 'due_date' => $duedate, 'pay_type' => $pay_type];

                return view('payments.reciept')->with($data);
            }
        }

        



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ready($id)
    {
        
    }
 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == 'Ready') {
            $total = DB::table('orders')->where('order_status', 'Ready')->sum('total_amount');
            $orders = Order::where('order_status', 'Ready')->paginate(5);
            // dd($orders);
            $data = ['orders' => $orders, 'total' => $total, 'title' => 'All Ready orders.'];

        return view('orders_sumry.index')->with($data);
            
        }

        if ($id == 'Pending') {
            $total = DB::table('orders')->where('order_status', 'Pending')->sum('total_amount');
            $orders = Order::where('order_status', 'Pending')->paginate(5);
            // dd($orders);
            $data = ['orders' => $orders, 'total' => $total, 'title' => 'All Pending orders.' ];

        return view('orders_sumry.index')->with($data);
            
        }

        if ($id == 'Collected') {
            dd("Working on is");
        }
        else
        {
           $total = DB::table('orders')->where('customer_id', $id)->sum('total_amount');
            $orders = Order::where('customer_id', $id)->paginate(5);
            // dd($orders);
            $data = ['orders' => $orders, 'total' => $total, 'title' => 'All orders for a customer'];

        return view('orders_sumry.index')->with($data); 
        }
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
