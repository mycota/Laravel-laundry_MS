@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #FF7F50; color: white; border: 1px solid black;">Place order for customer</div>

                <div class="card-body" style="border: 1px solid #FF7F50; box-shadow: 14px 12px 8px gray;">
                <form class="form-inline my-2 m" method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    {{ method_field('POST')}}
                  
                  <div class="form-group" >
                    <select type="text" class="form-control" name="item" required="" style="width: 300px;">
                      <option value="">Select cloth</option>
                      @foreach(cloths as cloth)
                        <option value="{{ cloth->id }}">{{ cloth->cloth_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" style="width: 300px;">
                    <input type="number" name="qty" class="form-control" placeholder="Enter quantity" required="" aria-label="item">
                  </div>
                  <input type="hidden" value="" name="transid">
                  <input type="hidden" value="" name="custid">
                    <button style="width: 300px;" class="btn btn-success my-2 my-sm-0" type="submit">Add</button>
                  </form><br><br>

                  <table class="table table-bordered table-hover">
                                  <thead style="background-color: black; color: white;">
                                    <tr>
                                      <!-- <th>Id</th> -->
                                      <th>Cloth name</th>
                                      <th>Quantity</th>
                                      <th>Unit price</th>
                                      <th>Amount</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>     
                                <tbody id="myTable">
                                  <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                
                                  @foreach(orders as order)
                                    <tr>
                                    <td>{{ order->cloth_name }}</td>
                                    <td>{{ order->quantity }}</td>
                                    <td>{{ order->unit_price }}</td>
                                    <td>{{ order->sub_total }}</td>
                                    
                                    <td><a style="color: red" href="#">Remove</a></td>
                                    </tr>
                                      
                                    
                                    
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>

                                @endforeach

                                </tbody>
                              </table>
                    <a href=""><button style="width: 300px;" class="btn btn-warning my-2 my-sm-0" type="submit">Cash Payment</button></a> | <a href=""><button style="width: 300px;" class="btn btn-info my-2 my-sm-0" type="submit">Card Payment</button></a>

  </center>
  </div>
</div>

@endsection