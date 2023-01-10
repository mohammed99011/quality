@extends('cms.parent')

@section('title' , 'Edit City')

@section('main-title' , 'Edit City')

@section('sub-title' , 'Edit City')

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
              <h3 class="card-title">Edit Data City</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">

              <div class="row">

                <div class="form-group col-md-6">
                  <label for="name">City Name</label>
                  <input type="text" class="form-control" name="name" id="name"
                  value="{{ $cities->name }}" placeholder="Enter City Name">
                </div>

                <div class="form-group col-md-6">
                  <label for="country_id"> Country Name</label>
                  <select class="form-control" name="country_id" style="width: 100%;"
                      id="country_id" aria-label=".form-select-sm example">
                     {{-- <option value="{{ $cities->country->id }}">{{ $cities->country->country_name }}</option> --}}
                      @foreach ($countries as $country )
                      <option @if ($country->id == $cities->country_id) selected @endif value="{{ $cities->country->id }}">
                        {{ $cities->country->country_name }}</option>
                      
                      @endforeach
                  </select>
              </div>
{{-- 
                @foreach ($units as $unit)
                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                <option @if ($unit->id == $products->unit_id) selected @endif value="{{ $unit->id }}">
                    {{ $unit->name }}</option>
            @endforeach --}}
            
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{$cities->id}})" class="btn btn-primary">Update</button>
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
  function performUpdate(id){

    let formData = new FormData();
    formData.append('name',document.getElementById('name').value);
    formData.append('country_id',document.getElementById('country_id').value);

    storeRoute('/cms/admin/cities_update/'+id , formData);

  }

  </script>
@endsection