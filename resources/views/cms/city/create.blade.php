@extends('cms.parent')

@section('title' , 'Create City')

@section('main-title' , 'Create City')

@section('sub-title' , 'Create City')

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
              <h3 class="card-title">Create New City</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
             <div class="row">

                <div class="form-group col-md-6">

                  <label for="name">City Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter City Name">
                </div>
             
                <div class="form-group col-md-6">
                  <label for="country_id"> City Name</label>
                  <select class="form-control" name="country_id" style="width: 100%;"
                      id="country_id" aria-label=".form-select-sm example">
                      @foreach ($countries as $country )
                          <option value="{{ $country->id }}" >{{ $country->country_name }}</option>
                      @endforeach
                  </select>
              </div>
               
                  {{-- </div> --}}
                  <!-- /.col -->
              
                  <!-- /.col -->
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('cities.index') }}" type="submit" class="btn btn-info">GO BACK</a>

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
    formData.append('country_id',document.getElementById('country_id').value);

    store('/cms/admin/cities' , formData);
}

</script>

@endsection
