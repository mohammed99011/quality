@extends('cms.parent')

@section('title' , 'INDESX Authors')

@section('main-title' , 'Index Authors ')

@section('sub-title' , 'Index Authors ')

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

                  <a href="{{ route('authors.create') }}" type="submit" class="btn btn-info">Add New Author</a>

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
                        <th>Artciles</th>

                        <th>Setting</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $author)
                      <tr>
                        <td>{{$author->id}}</td>
                        <td>
                          <img class="img-circle img-bordered-sm" src="{{asset('storage/images/author/'.$author->user->image)}}" width="50" height="50" alt="User Image">
                      </td>
                        <td>{{$author->user->first_name . " " . $author->user->last_name ?? ""}}</td>
                        {{-- <td>{{$admin->user->last_name ?? ""}}</td> --}}
                        <td>{{$author->email}}</td>
                        <td>{{$author->user->gender ?? ""}}</td>
                        <td>{{$author->user->status ?? ""}}</td>

                        <td>{{$author->user->city->name ?? ""}}</td>

                        <td><a href="{{route('indexArticle',['id'=>$author->id])}}"
                          class="btn btn-info">({{$author->articles_count}})
                          article/s</a> </td>

                        <td>
                            <div class="btn group">
                                <a href="{{ route('authors.edit' , $author->id) }}" type="button" class="btn btn-info">Edit</a>
                                <a href="#" onclick="performDestroy({{$author->id}} , this)"  class="btn btn-danger">Delete</a>
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
              {{ $authors->links() }}
            </div>
          </div>

        </div><!-- /.container-fluid -->
      </section>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/authors/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
