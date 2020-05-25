@extends('site.layouts.app')
@section('content')
  <section class="blog-area">
    <div class="container mt-3">
    	<h4 class="text-center">About Me</h4><br/><br/>
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="row">
          	<div class="col-md-7 text-justify">
              <?php echo $aboutme->section_1;?>
          	</div>

          	<div class="col-md-5 text-center mt-3">
          		<img src="{{ url('/') }}/public/uploads/{{ $aboutme->image }}" alt="person" 
              class="img-fluid rounded-circle"/>
          	</div>
          </div>
          <div class="row mt-3">
            <div class="col text-justify">
              <?php echo $aboutme->section_2;?>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col backToHome">
              <small><a href="{{ url('/') }}"><i class="fas fa-home"></i> Back To Home</a></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection