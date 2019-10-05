@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #FF7F50; color: white; border: 1px solid black;">Washing machine details</div>

                <div class="card-body" style="border: 1px solid #FF7F50; box-shadow: 14px 12px 8px gray;">
                    <form method="POST" enctype="multipart/form-data" action="#">
                        @csrf
                        {{ method_field('PATCH')}}
			
			<fieldset class="form-group" style="width: 600px;">
				<legend class="border-bottom mb-4">Washing machine Details</legend>
                        <div class="form-group row">
                            <input type="number" hidden name="user_id" value="{{ Auth::user()->id }}">
                            <label for="machine_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="machine_name" type="text" class="form-control @error('machine_name') is-invalid @enderror" name="machine_name" value="{{ old('machine_name') ?? $machine->machine_name }}" required autocomplete="machine_name" autofocus>

                                @error('machine_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') ?? $machine->model}}" required autocomplete="model" autofocus>

                                @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="manufacturer" class="col-md-4 col-form-label text-md-right">{{ __('Manufacturer') }}</label>

                            <div class="col-md-6">
                                <input id="manufacturer" type="text" class="form-control @error('manufacturer') is-invalid @enderror" name="manufacturer" value="{{ old('manufacturer') ?? $machine->manufacturer}}" required autocomplete="manufacturer" autofocus>

                                @error('model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $machine->price}}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_bought" class="col-md-4 col-form-label text-md-right">{{ __('Date bought') }}</label>

                            <div class="col-md-6">
                                <input id="date_bought" type="date" class="form-control @error('date_bought') is-invalid @enderror" name="date_bought" value="{{ old('date_bought') ?? $machine->date_bought}}" required autocomplete="date_bought" autofocus>

                                @error('date_bought')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

			</fieldset>
		<center>
			<div class="col-md-8" >
          <div class="content-section" style="background-color: #778899;">
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
