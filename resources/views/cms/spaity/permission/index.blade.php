@extends('cms.parent')

@section('title' , 'INDEX Permissions')

@section('main-title' , 'Index permissions ')

@section('sub-title' , 'Index permissions ')

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

                  <a href="{{ route('permissions.create') }}" type="submit" class="btn btn-info">Add New Permission</a>

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
                        <th>Permission Name</th>
                        <th>Guard Name</th>

                        <th>Setting</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                      <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->guard_name}}</td>

                        <td>
                            <div class="btn group">
                                <a href="{{ route('permissions.edit' , $permission->id) }}" type="button" class="btn btn-info">Edit</a>
                                <a href="#" onclick="performDestroy({{$permission->id}} , this)"  class="btn btn-danger">Delete</a>
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
              {{ $permissions->links() }}
            </div>
          </div>

        </div><!-- /.container-fluid -->
      </section>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/permissions/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
