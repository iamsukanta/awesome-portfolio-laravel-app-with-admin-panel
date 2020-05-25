@extends('admin.layouts.app')

@section('content')
  <div class="row p-3">
    <div class="col-md-12">
      <h5 class="text-secondary">Edit Blogpost</h5>
      <hr/>
      @if ($errors->has('success'))
        <div class="alert alert-success mt-2" role="alert">
          {{ $errors->first('success') }}
        </div>
      @endif
      <div class="row">
        <div class="col-md-10 mt-3">
          <form id="frmEditBlogpost" role="form" action="{{ route('blogposts.update',$blogpost->id) }}" method="post" enctype="multipart/form-data">
            <div class="box-body">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <div class="form-group">
                <label for="blogpost_title">Blogpost Title</label>
                <input type="text" class="form-control" id="blogpost_title" name="blogpost_title" placeholder="Enter blogpost title" autocomplete="off" value="{{ $blogpost->title }}">
                @if ($errors->has('blogpost_title'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('blogpost_title') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="blogpost_body">Blogpost Body</label>
                <textarea id="summernote" class="form-control summernote" name="blogpost_body"  rows="3">{{ $blogpost->body }}</textarea>
                @if ($errors->has('blogpost_body'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('blogpost_body') }}</small>
                @endif
              </div>
            </div>
            <button type="submit" name="submit" id="frmEditBlogpostBtn" class="btn btn-success">
              Save 
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection