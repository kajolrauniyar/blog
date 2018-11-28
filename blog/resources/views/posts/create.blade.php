@extends('layouts.frontend.main')

@section('title','|create new post')
@section ('stylesheets')
{!!Html::style('css/parsley.css')!!}
@stop

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2>Create New Post</h2>
		{!!Form :: open(array('route'=>'posts.store','data-parsley-validate'=>''))!!}
	{!! Form::open(['route' => 'posts.store']) !!}
     	{{ Form::label('title','Title:')}}
     	{{Form::text('title',null,array('class'=>'form-control' ,'style'=>'margin-top:10px; margin-bottom:10px;','required'=>'','max-length'=>'255'))}}
     	{{Form::label('body',"Post Body:")}}
     	{{Form::textarea('body',null, array('class'=>'form-control' ,'style'=>'margin-top:10px;','required'=>' '))}}
     	{{Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top:20px;'))}}
	{!! Form::close() !!}		
	</div>
</div>



@stop
@section('scripts')
	{!!Html::script('js/parsley.min.js')!!}
@stop
