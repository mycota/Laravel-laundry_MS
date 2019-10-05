@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #008B8B;; color: white; border: 1px solid pink;">Profile</div>

                
                	
			  
                <fieldset><center><legend>Update your profile</legend></center><hr>
                <div class="card-body" style="border: 1px solid #008B8B; box-shadow: 14px 12px 8px gray;">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update', $user->id) }}">
                        @csrf
                        {{ method_field('PUT')}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gend" class="col-md-4 col-form-label text-md-right">{{ __('Select gender') }}</label>

                            <div class="col-md-6">
                                <select  id="gender" type="text" class="form-control @error('gend') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender">
                             

									<option value="{{ $user->gender }}">{{ $user->gender }}</option>
									<option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" maxlength="10" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $user->phone }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus>{{ old('address') ?? $user->address }}</textarea>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bdate" class="col-md-4 col-form-label text-md-right">{{ __('Birth date') }}</label>

                            <div class="col-md-6">
                                <input id="bdate" type="date" class="form-control @error('bdate') is-invalid @enderror" name="bdate" value="{{ old('bdate') ?? $user->bdate }}" required autocomplete="bdate" autofocus>

                                @error('bdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mstatus" class="col-md-4 col-form-label text-md-right">{{ __('Marriage status') }}</label>

                            <div class="col-md-6">
                                <select id="mstatus" type="text" class="form-control @error('mstatus') is-invalid @enderror" name="mstatus" value="{{ old('mstatus') }}" required autocomplete="mstatus">
                                    <option value="{{ $user->mstatus }}">{{ $user->mstatus }}</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                </select>

                                @error('mstatus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="emplydate" class="col-md-4 col-form-label text-md-right">{{ __('Employment date') }}</label>

                            <div class="col-md-6">
                                <input readonly id="emplydate" type="date" class="form-control @error('emplydate') is-invalid @enderror" name="emplydate" value="{{ old('emplydate') ?? $user->emplydate }}" required autocomplete="emplydate" autofocus>

                                @error('emplydate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>

                            <div class="col-md-6">
                                <input readonly id="bod" type="text" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') ?? $user->salary}}" required autocomplete="salary" autofocus>

                                @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Select image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') ?? $user->image }}" autocomplete="image" >

                                @error('image')
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
                </div>
            </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection
