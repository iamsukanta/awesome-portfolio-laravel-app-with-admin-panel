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
        <div class="col-md-6 mt-3">
          <form id="frmEditResume" role="form" action="{{ route('resumes.update', $resume->id) }}" method="post">
            <div class="box-body">
              {{ method_field('PUT') }}
              {{ csrf_field()}}
              <div class="form-group">
                <label for="resume_link">Resume Link</label>
                <input type="text" class="form-control" id="resume_link" name="resume_link" placeholder="Enter resume link" autocomplete="off" value="{{ $resume->resume_link }}">
                @if ($errors->has('resume_link'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('resume_link') }}</small>
                @endif
              </div>
            </div>
            <button type="submit" name="submit" id="frmEditResume" class="btn btn-success">
              Save 
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection