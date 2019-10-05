@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #2F4F4F;; color: white; border: 1px solid gray;">Customer Reciept</div>

                <div class="card-body" style="border: 1px solid #2F4F4F; box-shadow: 14px 12px 8px gray;">
                  
                  <br>
<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px; position:absolute; margin-top: 40px; left: 800px"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>
	
	<div class="content" id="content">
    <center><label>Transaction Receipt</label></center>
    <hr>
    <br><br>
    <table cellpadding="3" cellspacing="0" style="margin-top: -30px; font-family: arial; font-size: 12px;text-align:left;width : 100%;">

		<tr>
		<td>Customer name: {{ $customer->cust_name }}</td></tr>
        <tr><td>Phone: {{ $customer->cust_phone }}</td></tr>
        <tr><td>Email: {{ $customer->cust_email }}</td></tr>
        <tr><td>Address: {{ $customer->cust_address }}</td></tr>

        <tr><td>Transaction ID: {{ $transid }}</td></tr>

        <tr><td>Date: {{ $date }}</td></tr>

         <tr><td>Due Date: {{ $due_date }} </td></tr>
         <tr><td>Payment type: {{ $pay_type }} </td></tr>
	</table>
	<br>
	<br>

	<div class="clearfix"></div>
	<div style="width: 100%; margin-top:-70px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
	<br><br><br><br>
		<thead>
			<tr>
				<th>Cloth name</th>
                <th>Quantity</th>
                <th>Unit price</th>
                <th>Amount</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach($orders as $order)
				<tr class="record">
				<td>{{ $order->cloth_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->unit_price }}</td>
                <td>{{ $order->sub_total}}</td>
				
				</tr>
			@endforeach
				<tr>
				<td></td>
				<td></td>
				<td colspan="1" style=" text-align:right;"><strong style="font-size: 12px;">Total: &nbsp;</strong></td>
					<td colspan="1">{{ $total }}<strong style="font-size: 12px;">
					
					</strong></td>
				</tr>
				
			
		</tbody>
	</table>
	<br>
	<center><div style="font:bold 12px 'Aleo';"></div>
	Thank you for doing business with us<br>
	God bless you.<br>	<br>
	</center>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection