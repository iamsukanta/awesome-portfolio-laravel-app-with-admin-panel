<?php
  function limit_words($string, $word_limit) {
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
  }
?>
@extends('site.layouts.app')
@section('content')
  <section class="blog-area">
    <div class="container">
      <div class="row justify-content-md-center">
        @if(count($blogposts) > 0)
          @foreach($blogposts as $blogpost)
            <div class="col-md-8 mt-5 blog-post">
              <a href="{{ url('/') }}/postdetails/{{ $blogpost->id }}"><h4 class="m-0 p-0">{{ $blogpost->title }}</h4></a>
              <small>{{ date('j-F-Y h:i a', strtotime($blogpost->created_at)) }}</small>
              <?php $postbody =$blogpost->body; ?>
              <article class="mt-2"><?php echo limit_words($postbody, 40); ?>...<a href="{{ url('/') }}/postdetails/{{ $blogpost->id }}"><small>Read More</small></a></article>
            </div>
          @endforeach
        @else
          <h5>No Blogpost Found.</h5>
        @endif
      </div>
      <div class="row mt-3 justify-content-md-center">
        <div class="col-md-6">
          <div class="pagination-view" style="margin:0 auto;">
            {{ $blogposts->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
