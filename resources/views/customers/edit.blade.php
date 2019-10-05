@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #2F4F4F;; color: white; border: 1px solid gray;">Update customer data</div>

                <div class="card-body" style="border: 1px solid #2F4F4F; box-shadow: 14px 12px 8px gray;">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('customers.update', $customer->id) }}">
                        @csrf
                        {{ method_field('PATCH')}}
                        <fieldset><center><legend>Update customer data</legend></center><hr>

                        <div class="form-group row">
                            <input type="number" hidden name="user_id" value="{{ Auth::user()->id }}">
                            <label for="cust_name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="cust_name" type="text" class="form-control @error('cust_name') is-invalid @enderror" name="cust_name" value="{{ old('cust_name') ?? $customer->cust_name }}" required autocomplete="cust_name" autofocus>

                                @error('cust_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cust_phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="cust_phone" type="text" maxlength="10" class="form-control @error('cust_phone') is-invalid @enderror" name="cust_phone" value="{{ old('cust_phone') ?? $customer->cust_phone}}" required autocomplete="cust_phone" autofocus>

                                @error('cust_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cust_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="cust_email" type="email" class="form-control @error('cust_email') is-invalid @enderror" name="cust_email" value="{{ old('cust_email') ?? $customer->cust_email}}" required autocomplete="cust_email">

                                @error('cust_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cust_gender" class="col-md-4 col-form-label text-md-right">{{ __('Select gender') }}</label>

                            <div class="col-md-6">
                                <select id="cust_gender" type="text" class="form-control @error('cust_gender') is-invalid @enderror" name="cust_gender" value="{{ old('cust_gender') }}" required autocomplete="cust_gender">
                                    <option value="" disabled>Select gender</option>
                                    <option value="{{$customer->cust_gender}}">{{$customer->cust_gender}}</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                                @error('cust_gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                

                        <div class="form-group row">
                            <label for="cust_address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="cust_address" type="text" class="form-control @error('cust_address') is-invalid @enderror" name="cust_address" value="{{ old('cust_address') }}" required autocomplete="cust_address" autofocus>{{ $customer->cust_address }}</textarea>

                                @error('cust_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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
