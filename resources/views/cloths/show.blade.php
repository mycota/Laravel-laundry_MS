@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #CD5C5C; color: white; border: 1px solid blue;">Cloth details</div>

                <div class="card-body" style="border: 1px solid #CD5C5C; box-shadow: 14px 12px 8px gray;">
                    <form method="POST" enctype="multipart/form-data" action="#">
                        @csrf
                        {{ method_field('PATCH')}}
			
			<fieldset class="form-group" style="width: 600px;">
				<legend class="border-bottom mb-4">Cloth Details</legend>
                        <div class="form-group row">
                            <input type="number" hidden name="user_id" value="{{ Auth::user()->id }}">
                            <label for="cloth_name" class="col-md-4 col-form-label text-md-right">{{ __('Cloth name') }}</label>

                            <div class="col-md-6">
                                <input id="cloth_name" type="text" class="form-control @error('cloth_name') is-invalid @enderror" name="cloth_name" value="{{ old('cloth_name') ?? $cloth->cloth_name }}" readonly required autocomplete="cloth_name" autofocus>

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
                                <input id="wash_price" type="text" class="form-control @error('wash_price') is-invalid @enderror" name="wash_price" value="{{ old('wash_price') ?? $cloth->wash_price }}" readonly required autocomplete="wash_price" autofocus>

                                @error('wash_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <input id="wash_price" type="text" class="form-control @error('wash_price') is-invalid @enderror" name="wash_price" value="{{ old('wash_price') ?? $cloth->category }}" readonly required autocomplete="wash_price" autofocus>

                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>				
			</fieldset>
		<center>
			<div class="col-md-8" >
          <div class="content-section" style="background-color: #D8BFD8;">
            <h3>Facts About this cloth</h3>
              <ul class="list-group">
                <li class="list-group-item list-group-item-light">Total Turn out: </li>
                <li class="list-group-item list-group-item-light">Last Date: </li>
                <li class="list-group-item list-group-item-light">Washed  times</li>
              </ul>
            </p>
          </div>
        </div>
		</center>
		
		</form>			
		
	</div>
</div>
</div>

	
    </div>
</div>
@endsection
