@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #CD5C5C; color: white; border: 1px solid blue;">Add new cloth</div>

                <div class="card-body" style="border: 1px solid #CD5C5C; box-shadow: 14px 12px 8px gray;">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('cloths.store') }}">
                        @csrf
                        {{ method_field('POST')}}
                        <fieldset><center><legend>Add new cloth</legend></center><hr>
                        <div class="form-group row">
                            <input type="number" hidden name="user_id" value="{{ Auth::user()->id }}">
                            <label for="cloth_name" class="col-md-4 col-form-label text-md-right">{{ __('Cloth name') }}</label>

                            <div class="col-md-6">
                                <input id="cloth_name" type="text" class="form-control @error('cloth_name') is-invalid @enderror" name="cloth_name" value="{{ old('cloth_name') }}" required autocomplete="cloth_name" autofocus>

                                @error('cloth_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="wash_price" class="col-md-4 col-form-label text-md-right">{{ __('Wash price') }}</label>

                            <div class="col-md-6">
                                <input id="wash_price" type="text" class="form-control @error('wash_price') is-invalid @enderror" name="wash_price" value="{{ old('wash_price') }}" required autocomplete="wash_price" autofocus>

                                @error('wash_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Select category') }}</label>

                            <div class="col-md-6">
                                <select id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category">
                                    <option value="" disabled>Select cloth type</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Kids">Kids</option>
                                </select>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
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
