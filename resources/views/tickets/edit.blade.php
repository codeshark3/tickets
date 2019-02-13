@extends('layouts.app_layout')

@section('content')
    
       
    <div class="container">
		<div class="row col-md-4 col-md-4-offset">
	        {!! Form::open(['action' => ['TicketsController@update',$ticket->id], 'method'=>'POST','enctype'=> 'multipart/form-data']) !!}
	        	<div class="form-group">
	        		{!! Form::label('title','Title') !!}
	        		{!! Form::text('title', $ticket->title, ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}

	        	</div>
	        	{{-- <div class="form-group">
	        		{!! Form::label('email', 'E-mail Address', []) !!}
					{{ Form::email('email', '', ['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
	        	</div> --}}
	        		{{Form::file('cover_image')}}
	        	
	        	<div class="form-group">
	        		{!! Form::label('description', 'Description', []) !!}
					{{ Form::textarea('description', $ticket->description, ['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Enter Description'])}}
	        	</div>

	        	<div>
	        		{{Form::hidden('_method','PUT')}}
	        		{!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
	        	
	        	</div>
	        	
	        {!! Form::close() !!}
 
		</div>

	</div>

     
@endsection
