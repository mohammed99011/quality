@extends('cms.parent')

@section('title' , 'Edit Permissions')

@section('main-title' , 'Edit Permissions')

@section('sub-title' , 'Edit Permissions')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit New Permissions</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">

                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="guard_name"> Guard NAme </label>
                        <select class="form-control" name="guard_name" style="width: 100%;"
                            id="guard_name" aria-label=".form-select-sm example">
                            <option value="admin" @if($permissions->guard_name == 'admin') selected @endif>Admin</option>
                            <option value="author" @if($permissions->guard_name == 'author') selected @endif>Author</option>

                        </select>
                    </div>

                <div class="form-group col-md-6">
                  <label for="name">Permissions Name</label>
                  <input type="text" class="form-control" name="name" id="name"
                  value="{{$permissions->name}}" placeholder="Enter Permissions Name">
                </div>
                        
          </div>             

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $permissions->id }})" class="btn btn-primary">Store</button>
                <a href="{{ route('permissions.index') }}" type="submit" class="btn btn-info">GO BACK</a>

              </div>
            </form>
          </div>
          <!-- /.card -->


        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')

<script>
function performUpdate(id){

let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('guard_name',document.getElementById('guard_name').value);
    store('/cms/admin/permissions_update/'+id , formData);
}

</script>

@endsection
