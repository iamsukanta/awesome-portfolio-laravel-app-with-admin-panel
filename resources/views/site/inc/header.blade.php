<section class="header">
  <div class="container">
    <div class="row p-4">
      <div class="col text-center">
        <a href="{{ url('/') }}"><h1 class="m-0">Sukanta Bala</h1></a>
        <small class="font-weight-bold">Software Engineer, Technical Writer, Tech Enthusiast</small class="font-weight-bold">
        <ul class="mt-3">
          <li><a href="{{ url('/aboutme') }}">About Me</a></li>
          <li><a href="{{ url('/portfolio') }}">Portfolio</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
          <li><a href="{{ $resume->resume_link }}" target="_blank">Resume</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>