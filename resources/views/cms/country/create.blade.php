@extends('cms.parent')

@section('title' , 'Create Country')

@section('main-title' , 'Create Country')

@section('sub-title' , 'Create Country')

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
              <h3 class="card-title">Create New Country</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="country_name">Country Name</label>
                  <input type="text" class="form-control" name="country_name" id="country_name" placeholder="Enter Country Name">
                </div>
                <div class="form-group">
                  <label for="code">Code</label>
                  <input type="number" class="form-control" name="code" id="code" placeholder="Enter Code of Country">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('countries.index') }}" type="submit" class="btn btn-info">GO BACK</a>

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
    formData.append('country_name',document.getElementById('country_name').value);
    formData.append('code',document.getElementById('code').value);
    store('/cms/admin/countries' , formData);
}

</script>

@endsection
