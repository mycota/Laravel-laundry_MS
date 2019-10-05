@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #708090; color: white; border: 1px solid black;">{{$title}}</div>

                <div class="card-body" style="border: 1px solid #708090; box-shadow: 14px 12px 8px gray;">
                <center><h5 class="page-header" style="background-color: #2F4F4F; color: white;">
All orders </h5></center>
<input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
<table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- <th>Id</th> -->
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Due date</th>
                        <th>Total item</th>
                        <th>Order ID</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>View</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
                  
                  @foreach($orders as $order)
                    
                    <tr>
                    <td>{{ $order->custorder->cust_name }}</td>
                    <td>{{ $date = date('d/m/Y',strtotime($order->created_at)) }}</td>
                    <td>{{ $date = date('d/m/Y',strtotime($order->due_date)) }}</td>
                    <td>{{ $order->total_item }}</td>
                    <td>{{ $order->transid }}</td>
                    <td>{{  $order->order_status }}</td>
                    <td>{{  $order->total_amount }}</td>
                    <td><a href="{{ route('payments.show', $order->transid) }}">View</a></td>
                    </tr>
                    
                    @endforeach
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td colspan="1" style=" text-align:right;"><strong style="font-size: 12px;">Total Cash: &nbsp;</strong></td>
                      <td colspan="1">{{ $total }}<strong style="font-size: 12px;">
                      <td></td>

          
          </strong></td>
        </tr>

                  </tbody>
                </table>
                <center>{{ $orders->links() }}</center>
  </div>
</div>
@endsection