@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #FF7F50; color: white; border: 1px solid black;">Manage Cloths</div>

                <div class="card-body" style="border: 1px solid #FF7F50; box-shadow: 14px 12px 8px gray;">
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <br>
                    <table class="table table-bordered table-hover">
                      <thead style="background-color: #778899">
                        <tr>
                          <th scope="col">Machine name</th>
                          <th scope="col">Model</th>
                          <th scope="col">Manufacturer</th>
                          <th scope="col">Price</th>
                          <th scope="col">Date Bought</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($machines as $mac)
                            <tr>
                                <td>{{ $mac->machine_name }}</td>
                                <td>{{ $mac->model }}</td>
                                <td>{{ $mac->manufacturer }}</td>
                                <td>{{ $mac->price }}</td>
                                <td>{{ $mac->date_bought }}</td>
                                <td>
                                  <a href="{{ route('wmachines.edit', $mac->id) }}" class="float-left">
                                    <button type="button" class="btn btn-primary btn-sm">Edit</button>
                                  </a> 
                                  <a href="{{ route('wmachines.show', $mac->id) }}" class="float-left">
                                    <button type="button" class="btn btn-info btn-sm">Machine details</button>
                                  </a> 

                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <center>{{ $machines->links() }}</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
