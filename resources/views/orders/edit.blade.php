@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #4B0082; color: white; border: 1px solid black;">Place order for customer</div>

                <div class="card-body" style="border: 1px solid #4B0082; box-shadow: 14px 12px 8px gray;">
                <form class="form-inline my-2 m" method="POST" action="{{ route('orders.store')}}">
                    @csrf
                    {{ method_field('POST')}}
                  
                  <div class="form-group" >
                    <select type="text" class="form-control" name="clothid" required="" style="width: 300px;">
                      <option value="">Select cloth</option>
                      @foreach($cloths as $cloth)
                        <option value="{{ $cloth->id }}">{{ $cloth->cloth_name }}</option>
                      @endforeach

                    </select>
                  </div>
                  <div class="form-group" style="width: 300px;">
                    <input type="number" name="qty" class="form-control" placeholder="Enter quantity" required="" aria-label="item">
                  </div>
                  <input type="hidden" value="{{ $transid }}" name="transid">
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
                                @if($total > 0)
                                  @foreach($orders as $order)
                                    <tr>
                                    <td>{{ $order->cloth_name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->unit_price }}</td>
                                    <td>{{ $order->sub_total}}</td>
                                    
                                    <td>
                                      <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="float-left">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                  </form>
                                    </td>
                                    </tr>
                                      
                                  @endforeach
                                    
                                    <tr>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                    </tr>

                                    <tr style="font-size: 15px; color: #222222; background-color: #c0c0c0;">
                                      <td colspan="1"><strong >Total</strong></td>
                                      <td></td>
                                      <td></td>
                                      <td colspan="1"><strong style="font-size: 15px; color: #222222;">{{ $total }} </strong></td>
                                      <td></td>
                                    </tr>
                                  @endif

                                </tbody>
                              </table>

                              @if($total > 0)
                              
                              <center>
                                <button style="width: 250px;" type="button" class="btn btn-primary lg" data-toggle="modal" data-target="#exampleModal">
                              Continue
                            </button>
                      

                              </center>
                              @endif


  </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: gray;">
        <h5 class="modal-title" id="exampleModalLabel">Complete Payment Process</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('payments.store')}}">
                    @csrf
                    {{ method_field('POST')}}
      <div class="modal-body">
        
        <input type="hidden" value="{{ $transid }}" name="transid">
        <div class="form-group row">
                            <label for="cust_gender" class="col-md-4 col-form-label text-md-right">{{ __('Select payment type') }}</label>

                            <div class="col-md-6">
                                <select id="pay_type" type="text" class="form-control @error('pay_type') is-invalid @enderror" name="pay_type" value="" required autocomplete="pay_type">
                                    <option value="" disabled>Select payment type</option>
                                    <option value="Cash Payment">Cash Payment</option>
                                    <option value="Card Payment">Card Payment</option>
                                </select>

                                @error('cust_gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Continue</button>
      </div>
    </div>
  </div>
</div>

@endsection