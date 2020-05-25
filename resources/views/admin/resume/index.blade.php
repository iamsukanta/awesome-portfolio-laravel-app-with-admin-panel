@extends('admin.layouts.app')

@section('content')
  <div class="row p-3">
    <div class="col-md-12">
      <h5 class="text-secondary">Resume Section</h5>
      <hr/>
      @if ($errors->has('success'))
        <div class="alert alert-success mt-2" role="alert">
          {{ $errors->first('success') }}
        </div>
      @endif
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="create-resume-tab" data-toggle="tab" href="#create-resume" role="tab" aria-controls="create-resume" aria-selected="true">Create Resume</a>
          <a class="nav-item nav-link" id="manage-resume-tab" data-toggle="tab" href="#manage-resume" role="tab" aria-controls="manage-resume" aria-selected="false">Manage Resume</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="create-resume" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="col-md-6 mt-3">
            <form id="frmCreateresume" role="form" action="{{ route('resumes.store') }}" method="post" 
                enctype="multipart/form-data">
              <div class="box-body">
                {{ csrf_field()}}
                <div class="form-group">
                  <label for="resume_link">Resume Link</label>
                  <input type="text" class="form-control" id="resume_link" name="resume_link" placeholder="Enter resume link" autocomplete="off">
                  @if ($errors->has('resume_link'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('resume_link') }}</small>
                  @endif
                </div>

              </div>
              <button type="submit" name="submit" id="frmCreateresumeBtn" class="btn btn-success">
                Save 
              </button>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="manage-resume" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div class="col-md-12 mt-3">
            <div class="table-responsive">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Resume Link</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sl=1; ?>
                  @if(count($resumes)>0)
                    @foreach($resumes as $resume)
                      <tr>
                        <td><?php echo $sl; ?></td>
                        <td>{{ $resume->resume_link}}</td>
                        <td >
                          <div class="btn-group" role="group">
                            <a href="{{ url('/') }}/resumes/{{$resume->id}}/edit"><button class="btn btn-success btn-sm"><i class="far fa-edit"></i></button></a>&nbsp;
                            <form role="form" action="{{ route('resumes.destroy', $resume->id) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete resume link?');" ><i class="far fa-trash-alt"></i></button>
                            </form>
                          </div>
                        </td>
                      </tr>
                      <?php $sl++; ?>
                    @endforeach
                  @else
                    <tr>
                      <td>No Resume Link Found.</td>
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