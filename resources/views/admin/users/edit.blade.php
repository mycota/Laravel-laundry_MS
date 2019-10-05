@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              
                  <div class="card-header" style="background-color: #008B8B;; color: white; border: 1px solid pink;">Manage {{ $user->name }}</div>

                <div class="card-body" style="border: 1px solid #008B8B; box-shadow: 14px 12px 8px gray;">
                    <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                      @csrf
                      {{ method_field('PUT') }}
                      <fieldset><center><legend>Update user role</legend></center><hr>

                      @foreach($roles as $role)

                        <div class="form-check">
                          <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->hasAnyRole($role->name)?'checked':'' }}>
                          <label>{{ $role->name }}</label>
                        </div>
                      @endforeach
                      <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                  </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
