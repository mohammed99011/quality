@extends('cms.parent')

@section('title' , 'INDESX Admins')

@section('main-title' , 'Index Admins ')

@section('sub-title' , 'Index Admins ')

@section('styles')

@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">


          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">

                  <a href="{{ route('admins.create') }}" type="submit" class="btn btn-info">Add New County</a>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Full Name</th>
                        
                        <th>email</th>
                        <th>gender</th>
                        <th>status</th>
                        <th>City Name</th>
                        <th>Setting</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                      <tr>
                        <td>{{$admin->id}}</td>
                        <td>
                          <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->user->image)}}" width="50" height="50" alt="User Image">
                      </td>
                        <td>{{$admin->user->first_name . " " . $admin->user->last_name ?? ""}}</td>
                        {{-- <td>{{$admin->user->last_name ?? ""}}</td> --}}
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->user->gender ?? ""}}</td>
                        <td>{{$admin->user->status ?? ""}}</td>

                        <td>{{$admin->user->city->name ?? ""}}</td>

                        <td>
                            <div class="btn group">
                                <a href="{{ route('admins.edit' , $admin->id) }}" type="button" class="btn btn-info">Edit</a>
                                <a href="#" onclick="performDestroy({{$admin->id}} , this)"  class="btn btn-danger">Delete</a>
                            </div>

                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              {{ $admins->links() }}
            </div>
          </div>

        </div><!-- /.container-fluid -->
      </section>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/admins/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
