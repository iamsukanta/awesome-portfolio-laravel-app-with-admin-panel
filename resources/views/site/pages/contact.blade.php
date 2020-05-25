@extends('site.layouts.app')
@section('content')
  <section class="blog-area">
    <div class="container mt-3">
      <h4 class="text-center">Contact Me</h4><br/><br/>
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <p><i class="far fa-envelope"></i> sukantabalacste28@gmail.com</p>
          <p class="linkText"><a href="{{ url('/') }}" target="_blank"><i class="fas fa-globe-americas"></i> {{ url('/') }}</a></p>
          <p><i class="fas fa-phone-square"></i> +880-1738123140</p>
          <p class="linkText"><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/sukanta-bala-461418117/" target="_blank"> Contact With LinkedIn</a></p>
        </div>
      </div>
      <div class="row justify-content-md-center">
        <div class="col-md-8 backToHome">
          <small><a href="{{ url('/') }}"><i class="fas fa-home"></i> Back To Home</a></small>
        </div>
      </div>
    </div>
  </section>
@endsection