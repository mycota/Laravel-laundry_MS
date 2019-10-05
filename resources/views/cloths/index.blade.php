@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #CD5C5C; color: white; border: 1px solid blue;">Manage Cloths</div>

                <div class="card-body" style="border: 1px solid #CD5C5C; box-shadow: 14px 12px 8px gray;">
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <br>
                    <table class="table table-bordered table-hover">
                      <thead style="background-color: #778899">
                        <tr>
                          <th scope="col">Cloth name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Category</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($cloths as $cloth)
                            <tr>
                                <td>{{ $cloth->cloth_name }}</td>
                                <td>{{ $cloth->wash_price }}</td>
                                <td>{{ $cloth->category }}</td>
                                <td>
                                  <a href="{{ route('cloths.edit', $cloth->id) }}" class="float-left">
                                    <button type="button" class="btn btn-primary btn-sm">Edit cloth</button>
                                  </a> 
                                  <a href="{{ route('cloths.show', $cloth->id) }}" class="float-left">
                                    <button type="button" class="btn btn-info btn-sm">Cloth details</button>
                                  </a> 

                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <center>{{ $cloths->links() }}</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
