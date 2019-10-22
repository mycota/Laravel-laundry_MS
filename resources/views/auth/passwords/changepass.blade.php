@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #CD5C5C; color: white; border: 1px solid blue;">Change your password</div>

                <div class="card-body" style="border: 1px solid #CD5C5C; box-shadow: 14px 12px 8px gray;">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('passwords.update', Auth::user()->id) }}">
                        @csrf
                        {{ method_field('PATCH')}}
                        <fieldset><center><legend>Change your password</legend></center><hr>
                        <div class="form-group row">
                            <label for="older_pass" class="col-md-4 col-form-label text-md-right">{{ __('Old password') }}</label>

                            <div class="col-md-6">
                                <input id="older_pass" type="password" class="form-control @error('older_pass') is-invalid @enderror" name="older_pass" required autocomplete="older_pass" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new_pass" class="col-md-4 col-form-label text-md-right">{{ __('New password') }}</label>

                            <div class="col-md-6">
                                <input id="new_pass" type="password" class="form-control @error('new_pass') is-invalid @enderror" name="new_pass" required autocomplete="new_pass" autofocus>

                                @error('new_pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="conf_pass" class="col-md-4 col-form-label text-md-right">{{ __('Confirm password') }}</label>

                            <div class="col-md-6">
                                <input id="conf_pass" type="password" class="form-control @error('conf_pass') is-invalid @enderror" name="conf_pass" required autocomplete="conf_pass" autofocus>

                                @error('conf_pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Change') }}
                                </button>
                            </div>
                        </div>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
