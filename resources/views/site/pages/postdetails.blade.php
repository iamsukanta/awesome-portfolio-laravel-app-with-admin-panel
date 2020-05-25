@extends('site.layouts.app')
@section('content')
  <section class="blog-area">
    <div class="container mt-3">
      <div class="row justify-content-md-center">
      	<div class="col-md-8 text-justify">
          <h4 class="text-center">{{ $blogpost->title }}</h4>
          <h6 class="text-center"><small>{{ date('j-F-Y h:i a', strtotime($blogpost->created_at)) }}</small></h6>
          <br/>
          <article><?php echo $blogpost->body;?></article>
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