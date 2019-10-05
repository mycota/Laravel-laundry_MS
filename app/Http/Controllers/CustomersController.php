<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Cloth;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index')->with('customers', Customer::paginate(5));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::create($this->validateRequest());
        // $time = time();
        $custid = $customer->id;
        // $cloths = Cloth::all();
        return redirect()->route('orders.edit', $custid)->with(['success'=>'You have a new customer, place order now']);

        // dd(Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('customers.edit')->with('customer', Customer::find($id));
        
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
        $customer = Customer::find($id);
        $customer->update($this->validateRequest());
        if ($customer) {
            return redirect()->route('customers.index')->with(['customer'=>Customer::find($id), 'success'=>'Customer data updated.']);
        }
        return redirect()->route('customers.index')->with(['customer'=>Customer::find($id), 'warning'=>'Customer data was not updated try again !!!!!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findorfail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with(['customers' => Customer::paginate(5), 'success' => 'Customer data deleted..']);

    }

    private function validateRequest()
    {
        return request()->validate([
            'user_id' => ['required', 'numeric'],
            'cust_name' => ['required', 'string', 'max:255'],
            'cust_email' => ['required', 'string', 'email', 'max:255'],
            'cust_gender' => ['required', 'string', 'max:6'],
            'cust_phone' => ['required', 'string', 'max:10'],
            'cust_address' => ['required', 'string', 'max:255'],

            
        ]);
    }

}
