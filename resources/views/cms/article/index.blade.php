@extends('cms.parent')

@section('title' , 'INDESX Article')

@section('main-title' , 'Index Article ')

@section('sub-title' , 'Index Article ')

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

                  <a href="{{ route('createArticle' , $id) }}" type="submit" class="btn btn-info">Add New Article</a>

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
                        <th>Article Name</th>
                        <th>image</th>
                        <th>short description</th>

                        <th>Setting</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                      <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->title}}</td>
                        <td>
                          <img class="img-circle img-bordered-sm" src="{{asset('storage/images/article/'.$article->image)}}" width="50" height="50" alt="User Image">
                      </td>
                        <td>{{$article->short_description}}</td>

                        <td>
                            <div class="btn group">
                                <a href="{{ route('categories.edit' , $article->id) }}" type="button" class="btn btn-info">Edit</a>
                                <a href="#" onclick="performDestroy({{$article->id}} , this)"  class="btn btn-danger">Delete</a>
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
              {{ $articles->links() }}
            </div>
          </div>
    
        </div><!-- /.container-fluid -->
      </section>
@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        let url ='/cms/admin/articles/'+id;
        confirmDestroy(url , referance);
    }
  </script>
@endsection
