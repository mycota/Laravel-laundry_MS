@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #008B8B;; color: white; border: 1px solid pink;">Manage users</div>

                <div class="card-body" style="border: 1px solid #008B8B; box-shadow: 14px 12px 8px gray;">
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <br>
                    <table class="table table-bordered table-hover">
                      <thead class="thback" style="background-color: #778899">
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Employment date</th>
                          <th scope="col">Roles</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->emplydate }}</td>
                                <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                  <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                    <button type="button" class="btn btn-primary btn-sm">Edit Role</button>
                                  </a> 

                                  <a href="{{ route('admin.users.edituser', $user->id) }}" class="float-left">
                                    <button type="button" class="btn btn-info btn-sm">Edit User</button>
                                  </a> 

                                  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <center>{{ $users->links() }}</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
