@extends('admin.layouts.app')

@section('content')
  <div class="row p-3">
    <div class="col-md-12">
      <h5 class="text-secondary">Blogpost Section</h5>
      <hr/>
      @if ($errors->has('success'))
        <div class="alert alert-success mt-2" role="alert">
          {{ $errors->first('success') }}
        </div>
      @endif
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="create-blogpost-tab" data-toggle="tab" href="#create-blogpost" role="tab" aria-controls="create-blogpost" aria-selected="true">Create Blogpost</a>
          <a class="nav-item nav-link" id="manage-blogpost-tab" data-toggle="tab" href="#manage-blogpost" role="tab" aria-controls="manage-blogpost" aria-selected="false">Manage Blogpost</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="create-blogpost" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="col-md-10 mt-3">
            <form id="frmCreateBlogpost" role="form" action="{{ route('blogposts.store') }}" method="post">
              <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="blogpost_title">Blogpost Title</label>
                  <input type="text" class="form-control" id="blogpost_title" name="blogpost_title" placeholder="Enter blogpost title" autocomplete="off">
                  @if ($errors->has('blogpost_title'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('blogpost_title') }}</small>
                  @endif
                </div>

                <div class="form-group">
                  <label for="blogpost_body">Blogpost Body</label>
                  <textarea id="summernote" class="form-control summernote" name="blogpost_body"  rows="3"></textarea>
                  @if ($errors->has('blogpost_body'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('blogpost_body') }}</small>
                  @endif
                </div>
              </div>
              <button type="submit" name="submit" id="frmCreateBlogpostBtn" class="btn btn-success">
                Save 
              </button>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="manage-blogpost" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div class="col-md-12 mt-3">
            <div class="table-responsive">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Blogpost Title</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sl=1; ?>
                  @if(count($blogposts)>0)
                    @foreach($blogposts as $blogpost)
                      <tr>
                        <td><?php echo $sl; ?></td>
                        <td>{{ $blogpost->title}}</td>
                        <td >
                          <div class="btn-group" role="group">
                            <a href="{{ url('/') }}/blogposts/{{$blogpost->id}}/edit"><button class="btn btn-success btn-sm"><i class="far fa-edit"></i></button></a>&nbsp;
                            <form role="form" action="{{ route('blogposts.destroy', $blogpost->id) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete blogpost link?');" ><i class="far fa-trash-alt"></i></button>
                            </form>
                          </div>
                        </td>
                      </tr>
                      <?php $sl++; ?>
                    @endforeach
                  @else
                    <tr>
                      <td>No Blogpost Found.</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection