@extends('site.layouts.app')
@section('content')
  <section class="blog-area">
    <div class="container mt-3">
    	<h4 class="text-center">Portfolio</h4>
      <div class="row justify-content-md-center">
        @if(count($portfolios) > 0)
          @foreach($portfolios as $portfolio)
          	<div class="col-md-8 mt-5 blog-post">
              <a href="{{ $portfolio->web_address }}" target="_blank"><h4>{{ $portfolio->title }}</h4></a>
              <span>Development Tools: {{ $portfolio->development_tools }}</span><br/>
              <span>Web Address: <a href="{{ $portfolio->web_address }}" target="_blank">{{ $portfolio->web_address }}</a></span>
            </div>
          @endforeach
        @else
          <h5>No Portfolio Found.</h5>
        @endif
      </div>
      
      <div class="row mt-3 justify-content-md-center">
        <div class="col-md-6">
          <div class="pagination-view" style="margin:0 auto;">
            {{ $portfolios->links() }}
          </div>
        </div>
      </div>

      <div class="row mt-3 justify-content-md-center">
        <div class="col-md-8 backToHome">
          <small><a href="{{ url('/') }}"><i class="fas fa-home"></i> Back To Home</a></small>
        </div>
      </div>
    </div>
  </section>
@endsection