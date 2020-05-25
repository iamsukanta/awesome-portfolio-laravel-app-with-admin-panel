@extends('admin.layouts.app')

@section('content')
  <div class="row p-3">
    <div class="col-md-12">
      <h5 class="text-secondary">Edit Resume Section</h5>
      <hr/>
      @if ($errors->has('success'))
        <div class="alert alert-success mt-2" role="alert">
          {{ $errors->first('success') }}
        </div>
      @endif
      <div class="row">
        <div class="col-md-10 mt-3">
          <form id="frmEditAboutMe" role="form" action="{{ route('aboutmes.update',$aboutme->id) }}" method="post" 
            enctype="multipart/form-data">
            <div class="box-body">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <div class="form-group">
                <label for="section_1">Writing Section 1</label>
                <textarea id="summernote" class="form-control section_1" name="section_1"  rows="3">
                  {{ $aboutme->section_1 }}</textarea>
                @if ($errors->has('section_1'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('section_1') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="section_2">Writing Section 2</label>
                <textarea id="summernote" class="form-control section_2" name="section_2"  rows="3">
                  {{ $aboutme->section_2 }}</textarea>
                @if ($errors->has('section_2'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('section_2') }}</small>
                @endif
              </div>

              <div class="form-group">
                <div class="form-group">
                  <label for="image">Profile Image</label>
                  <input type="file" class="form-control-file" id="image" name="image">
                </div>
                @if ($errors->has('image'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('image') }}</small>
                @endif
              </div>

              <div class="row">
                <div class="col">
                  <label for="image">Current Profile Image</label><br/>
                  <img src="{{ url('/')}}/public/uploads/{{ $aboutme->image }}" width="100px" height="100px">
                </div>
              </div>
            </div>
            <br/>
            <button type="submit" name="submit" id="frmEditAboutMeBtn" class="btn btn-success">
              Save 
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection