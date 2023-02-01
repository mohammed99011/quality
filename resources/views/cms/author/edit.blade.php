@extends('cms.parent')

@section('title' , 'Edit Author')

@section('main-title' , 'Edit Author')

@section('sub-title' , 'Edit Author')

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
              <h3 class="card-title">Edit New Author</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
             <div class="row">

                <div class="form-group col-md-4">

                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" name="first_name" id="first_name"
                   value="{{ $authors->user->first_name }}" placeholder="Enter First Name">
                </div>

                 <div class="form-group col-md-4">

                  <label for="last_name">Last Name Name</label>
                  <input type="text" class="form-control" name="last_name" id="last_name"
                  value="{{ $authors->user->last_name }}" placeholder="Enter author Name">
                </div>

                 <div class="form-group col-md-4">

                  <label for="mobile"> Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile"
                  value="{{ $authors->user->mobile }}" placeholder="Enter author Name">
                </div>
              </div>
             <div class="row">

                <div class="form-group col-md-4">

                  <label for="email"> Email</label>
                  <input type="email" class="form-control" name="email" id="email"
                  value="{{ $authors->email }}" placeholder="Enter author Name">
                </div>

                {{-- <div class="form-group col-md-4">

                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter author Name">
                </div> --}}

                <div class="form-group col-md-4">

                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" id="address"
                  value="{{ $authors->user->address }}" placeholder="Enter author Name">
                </div>
                </div>

             <div class="row">

              <div class="form-group col-md-4">
                  <label for="city_id">City</label>
                  <select class="form-control" name="city_id" style="width: 100%;"
                      id="city_id" aria-label=".form-select-sm example">
                      @foreach ($cities as $city )
                      <option @if ($city->id == $authors->user->city->city_id) selected @endif value="{{ $authors->user->city->id }}">
                        {{ $authors->user->city->name }}</option>
                      @endforeach
                  </select>
              </div>

                    <div class="form-group col-md-4">
                     <label for="gender">Gender</label>
                     <select class="form-select form-select-sm" name="gender" style="width: 100%;"
                           id="gender" aria-label=".form-select-sm example">
                           <option selected> {{ $authors->user->gender }} </option>
                           <option value="male">Male </option>
                          <option value="female">female </option>
                       </select>
              </div>

                    <div class="form-group col-md-4">
                     <label for="status">Status</label>
                     <select class="form-select form-select-sm" name="status" style="width: 100%;"
                           id="status" aria-label=".form-select-sm example">
                           <option selected> {{ $authors->user->status }} </option>
                           <option value="active">Active </option>
                          <option value="inactive">Inactive </option>
                       </select>
              </div>
            </div>

             <div class="row">

                <div class="form-group col-md-6">
                  <label for="date">Date of Birth</label>
                  <input type="date" class="form-control" id="date" name="date"
                  value="{{ $authors->user->date }}" placeholder="Enter address of author">
                </div>

                <div class="form-group col-md-6">
                  <label for="image">Choose Image</label>
                  <input type="file" class="form-control" id="image" name="image" placeholder="Enter address of author">
                </div>

            </div>

                  {{-- </div> --}}
                  <!-- /.col -->
              
                  <!-- /.col -->
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $authors->id }})" class="btn btn-primary">Update</button>
                <a href="{{ route('authors.index') }}" type="submit" class="btn btn-info">GO BACK</a>

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
    formData.append('first_name',document.getElementById('first_name').value);
    formData.append('last_name',document.getElementById('last_name').value);
    formData.append('mobile',document.getElementById('mobile').value);
    formData.append('email',document.getElementById('email').value);
    // formData.append('password',document.getElementById('password').value);
    formData.append('address',document.getElementById('address').value);
    formData.append('gender',document.getElementById('gender').value);
    formData.append('status',document.getElementById('status').value);
    formData.append('date',document.getElementById('date').value);
    formData.append('city_id',document.getElementById('city_id').value);
    formData.append('image',document.getElementById('image').files[0]);

    storeRoute('/cms/admin/authors_update/'+id , formData);
}

</script>

@endsection
