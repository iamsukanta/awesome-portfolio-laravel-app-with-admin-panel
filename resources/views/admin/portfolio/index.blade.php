@extends('admin.layouts.app')

@section('content')
  <div class="row p-3">
    <div class="col-md-12">
      <h5 class="text-secondary">Portfolio Section</h5>
      <hr/>
      @if ($errors->has('success'))
        <div class="alert alert-success mt-2" role="alert">
          {{ $errors->first('success') }}
        </div>
      @endif
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="create-portfolio-tab" data-toggle="tab" href="#create-portfolio" role="tab" aria-controls="create-portfolio" aria-selected="true">Create Portfolio</a>
          <a class="nav-item nav-link" id="manage-portfolio-tab" data-toggle="tab" href="#manage-portfolio" role="tab" aria-controls="manage-portfolio" aria-selected="false">Manage Portfolio</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="create-portfolio" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="col-md-6 mt-3">
            <form id="frmCreateportfolio" role="form" action="{{ route('portfolios.store') }}" method="post">
              <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="portfolio_title">Portfolio Title</label>
                  <input type="text" class="form-control" id="portfolio_title" name="portfolio_title" placeholder="Enter portfolio title" autocomplete="off">
                  @if ($errors->has('portfolio_title'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('portfolio_title') }}</small>
                  @endif
                </div>

                <div class="form-group">
                  <label for="development_tools">Development Tools</label>
                  <input type="text" class="form-control" id="development_tools" name="development_tools" placeholder="Enter Development Tools" autocomplete="off">
                  @if ($errors->has('development_tools'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('development_tools') }}</small>
                  @endif
                </div>

                <div class="form-group">
                  <label for="web_address">Web Address</label>
                  <input type="text" class="form-control" id="web_address" name="web_address" placeholder="Enter Web Address" autocomplete="off">
                  @if ($errors->has('web_address'))
                    <small class="text-danger font-weight-bold errortext">{{ $errors->first('web_address') }}</small>
                  @endif
                </div>

              </div>
              <button type="submit" name="submit" id="frmCreateportfolioBtn" class="btn btn-success">
                Save 
              </button>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="manage-portfolio" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div class="col-md-12 mt-3">
            <div class="table-responsive">
              <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Portfolio Title</th>
                    <th>Portfolio Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sl=1; ?>
                  @if(count($portfolios)>0)
                    @foreach($portfolios as $portfolio)
                      <tr>
                        <td><?php echo $sl; ?></td>
                        <td>{{ $portfolio->title}}</td>
                        <td>{{ $portfolio->web_address}}</td>
                        <td >
                          <div class="btn-group" role="group">
                            <a href="{{ url('/') }}/portfolios/{{$portfolio->id}}/edit"><button class="btn btn-success btn-sm"><i class="far fa-edit"></i></button></a>&nbsp;
                            <form role="form" action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST">
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete portfolio link?');" ><i class="far fa-trash-alt"></i></button>
                            </form>
                          </div>
                        </td>
                      </tr>
                      <?php $sl++; ?>
                    @endforeach
                  @else
                    <tr>
                      <td>No Portfolio Found.</td>
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