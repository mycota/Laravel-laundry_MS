@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header" style="background-color: #2F4F4F;; color: white; border: 1px solid gray;">Make card payment</div>

                <div class="card-body" style="border: 1px solid #2F4F4F; box-shadow: 14px 12px 8px gray;">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('orders_sumry.store') }}">
                        @csrf
                        {{ method_field('POST')}}
                        <fieldset><center><legend>Make card payment</legend></center><hr>

                        <div class="form-group row">
                            <input type="number" hidden name="user_id" value="{{ Auth::user()->id }}">
                            <input type="text" hidden name="transid" value="{{ $transid }}">
                            <input type="text" hidden name="custid" value="{{ $customer->id }}">
                            <input type="text" hidden name="pay_type" value="{{ $pay_type }}">
                            <label for="cust_name" class="col-md-4 col-form-label text-md-right">{{ __('Customer name:') }}</label>

                            <div class="col-md-6">
                                <input id="cust_name" type="text" class="form-control @error('cust_name') is-invalid @enderror" name="cust_name" value="{{ old('cust_name') ?? $customer->cust_name }}" readonly>

                                @error('cust_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_amount" class="col-md-4 col-form-label text-md-right">{{ __('Total amount:') }}</label>

                            <div class="col-md-6">
                                <input id="total_amount" type="text" maxlength="10" class="form-control @error('total_amount') is-invalid @enderror" name="total_amount" value="{{ old('total_amount') ?? $total}}" readonly>

                                @error('total_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cash_given" class="col-md-4 col-form-label text-md-right">{{ __('Payment ID from POS') }}</label>

                            <div class="col-md-6">
                                <input id="trans_id" type="text" class="form-control @error('trans_id') is-invalid @enderror" name="trans_id" value="{{ old('trans_id') }}" required autocomplete="trans_id" placeholder="Enter payment id">

                                @error('trans_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    

                        <div class="form-group row">
                            <label for="duedate" class="col-md-4 col-form-label text-md-right">{{ __('Due date') }}</label>

                            <div class="col-md-6">
                                <input id="duedate" type="date" class="form-control @error('duedate') is-invalid @enderror" name="duedate"  required >

                                @error('duedate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pay') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
