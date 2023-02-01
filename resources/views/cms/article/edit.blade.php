@extends('cms.parent')

@section('title' , 'Edit Category')

@section('main-title' , 'Edit Category')

@section('sub-title' , 'Edit Category')

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
              <h3 class="card-title">Edit New Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group col-md-6">
                  <label for="name">Category Name</label>
                  <input type="text" class="form-control" name="name" id="name"
                  value="{{ $categories->name }}" placeholder="Enter Category Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="status">Status</label>
                  <select class="form-select form-select-sm" name="status" style="width: 100%;"
                        id="status" aria-label=".form-select-sm example">
                        <option selected> {{ $categories->status }} </option>

                        <option value="active">Active </option>
                       <option value="inactive">Inactive </option>
                    </select>
           </div>             
          </div>             

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('categories.index') }}" type="submit" class="btn btn-info">GO BACK</a>

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
function performStore(){

let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('status',document.getElementById('status').value);
    store('/cms/admin/categories' , formData);
}

</script>

@endsection
