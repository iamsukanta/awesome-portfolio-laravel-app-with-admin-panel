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
          <form id="frmEditPortfolio" role="form" action="{{ route('portfolios.update',$portfolio->id) }}" method="post">
            <div class="box-body">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <div class="form-group">
                <label for="portfolio_title">Portfolio Title</label>
                <input type="text" class="form-control" id="portfolio_title" name="portfolio_title" placeholder="Enter portfolio title" autocomplete="off" value="{{ $portfolio->title }}">
                @if ($errors->has('portfolio_title'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('portfolio_title') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="development_tools">Development Tools</label>
                <input type="text" class="form-control" id="development_tools" name="development_tools" placeholder="Enter Development Tools" autocomplete="off" value="{{ $portfolio->development_tools }}">
                @if ($errors->has('development_tools'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('development_tools') }}</small>
                @endif
              </div>

              <div class="form-group">
                <label for="web_address">Web Address</label>
                <input type="text" class="form-control" id="web_address" name="web_address" placeholder="Enter Web Address" autocomplete="off" value="{{ $portfolio->web_address }}">
                @if ($errors->has('web_address'))
                  <small class="text-danger font-weight-bold errortext">{{ $errors->first('web_address') }}</small>
                @endif
              </div>
            </div>
            <button type="submit" name="submit" id="frmEditPortfolioBtn" class="btn btn-success">
              Save 
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection