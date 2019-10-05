<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailOrder;
use App\Cloth;
use DB;


class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('orders.index')->with('orders', DetailOrder::all());
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

        $transid = request('transid');
        $qty = request('qty');
        $clothid = request('clothid');
        $getcloth = Cloth::findorfail($clothid);
        $getclothname = $getcloth->cloth_name;
        $getprice = $getcloth->wash_price;
        $sub_total = $qty * $getprice;

        // dd($sub_total, $transid, $qty, $clothid, $getcloth, $getclothname, $getprice);

        $insertorder = DB::table('detailorders')->insert(['transid' => $transid, 'cloth_name' => $getclothname, 'quantity' => $qty, 'unit_price' => $getprice, 'sub_total' => $sub_total]);
        if ($insertorder) {
            return redirect()->route('orders.edit', $transid)->with(['success'=>'Cloth added .....']);
        }

        return redirect()->route('orders.edit', $transid)->with(['warning'=>'Cloth was not added .....']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return redirect()->route('orders.place_order')->with(['transid' => $id, 'orders' = OrderDetails::find($transid)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (preg_match("/-/", $id)) 
        {
            // placing an order for existing customer.
            $total = DB::table('detailorders')->where('transid', $id)->sum('sub_total');
            $orders = DB::table('detailorders')->where('transid', $id)->get();
            // dd($orders);
            $data = ['transid' => $id, 'cloths'=>Cloth::all(), 'total' => $total, 'orders' => $orders];
            return view('orders.edit')->with($data);
        }
        else{
            // when new customer is created you are redirected here.
            $time = time();
            $transid = $id."-".$time; // id is the customer id and used to create a unique trasaction id using a the time function

            $total = 0;
            return view('orders.edit')->with(['transid' => $transid, 'cloths'=>Cloth::all(), 'total' => $total]);   
        }

        

            // if (preg_match("/-/", $id)) {
        //     $total = 0;
        //     // when new customer is created you are redirected here.
        //     return view('orders.edit')->with(['transid' => $id, 'cloths'=>Cloth::all(), 'total' => $total, 'custid' => $id]);
        // }
        // else{
        //     // placing an order for existing customer. 
            // $gettotal = DetailOrder::findorfail('transid',$transid);
            // $gettotal = DB::table('detailorders')->where('transid', $transid);
            // dd($gettotal);
            // if ($gettotal != null) {
            //     return redirect()->route('orders.edit', $id)->with(['transid' => $id, 'orders' => DetailOrder::findorfail('transid', $id), 'cloths'=>Cloth::all(), 'total' => $total]);
            // }

            // else{
            //     return redirect()->route('orders.edit', $transid)->with(['transid' => $transid, 'cloths'=>Cloth::all(), 'total' => $total]);
            // }
        
        
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
        $total = DB::table('detailorders')->where('transid', $id)->sum('sub_total');
        $orders = DetailOrder::findorfail($id);
        $transid = $orders->transid;
        // dd($orders);

        $orderitem = DetailOrder::findorfail($id);
        $orderitem->delete();

        return redirect()->route('orders.edit', $transid)->with('success', 'Item removed from cart.');

    }
}
