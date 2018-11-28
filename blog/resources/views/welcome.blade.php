@extends('layouts.frontend.main')
@section('title','| Homepage')
@section('content')
<div class="row">
       <div class="jumbotron">
           <div class="container">
        <h1>Hello, Welcome to my Blog</h1>
        <p class="lead">Thankyou for being a part of my test blog</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
       </div>
       </div>
</div><!-- end row -->
<div class="row">
    <div class="col-md-8">
        @foreach($posts as $post)
        <div class="post">
            <h3>{{$post->title}}</h3>
            <p>{{$post->body}}</p>
            <a href="#" class="btn btn-primary">Read more</a>
        </div>
       @endforeach
     
    </div>
    <div class="col-md-3 col-md-offset-1">
        <h2>Sidebar</h2>
    </div>
</div>
@stop