<?php
  function limit_words($string, $word_limit) {
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
  }
?>

@extends('admin.layouts.app')
@section('content')
  <div class="row p-3">
    <div class="col-md-12">
      <h5 class="text-secondary">AboutMe Section</h5>
      <hr/>
      @if ($errors->has('success'))
        <div class="alert alert-success mt-2" role="alert">
          {{ $errors->first('success') }}
        </div>
      @endif
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="create-aboutme-tab" data-toggle="tab" href="#create-aboutme" role="tab" aria-controls="create-aboutme" aria-selected="true">Create AboutMe</a>
          <a class="nav-item nav-link" id="manage-aboutme-tab" data-toggle="tab" href="#manage-aboutme" role="tab" aria-controls="manage-aboutme" aria-selected="false">Manage AboutMe</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="create-aboutme" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="col-md-10 mt-3">
            <form id="frmCreateaboutme" role="form" action="{{ route('aboutmes.store') }}" method="post" 
            enctype="multipart/form-data">
              <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="section_1">Writing Section 1</label>
                  <textarea id="summernote" class="form-control section_1" name="section_1"  rows="3"></textarea>
                  @if ($errors->has('section_1'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('section_1') }}</small>
                  @endif
                </div>

                <div class="form-group">
                  <label for="section_2">Writing Section 2</label>
                  <textarea id="summernote" class="form-control section_2" name="section_2"  rows="3"></textarea>
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

              </div>
              <button type="submit" name="submit" id="frmCreateaboutmeBtn" class="btn btn-success">
                Save 
              </button>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="manage-aboutme" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div class="col-md-12 mt-3">
            <div class="table-responsive">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>SL.</th>
                    <th>AboutMe Section 1</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sl=1; ?>
                  @if(count($aboutmes)>0)
                    @foreach($aboutmes as $aboutme)
                      <tr>
                        <td><?php echo $sl; ?></td>
                        <td>{{ limit_words($aboutme->section_1, 30) }}...</td>
                        <td><img src="{{ url('/')}}/public/uploads/{{ $aboutme->image }}" width="80px" height="60px"></td>
                        <td >
                          <div class="btn-group" role="group">
                            <a href="{{ url('/') }}/aboutmes/{{$aboutme->id}}/edit"><button class="btn btn-success btn-sm"><i class="far fa-edit"></i></button></a>&nbsp;
                            <form role="form" action="{{ route('aboutmes.destroy', $aboutme->id) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete aboutme link?');" ><i class="far fa-trash-alt"></i></button>
                            </form>
                          </div>
                        </td>
                      </tr>
                      <?php $sl++; ?>
                    @endforeach
                  @else
                    <tr>
                      <td>No AboutMe Found.</td>
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