@extends('layouts.app_layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }

  .bt-n{
  	display:inline-block;
  }
</style>
<div>
 <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createModal">Create</button>
 
 
  <table class="table table-bordered table-striped table-md table-hover reponsive" cellspacing="0" width="100%" style="font-weight: bold">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Status</td>
          <td>USER ID</td>
          <td>SPECIALIST ID</td>
          <td>actions</td>
         </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td>{{$ticket->id}}</td>
            <td>{{$ticket->title}}</td>
            <td>{{$ticket->status}}</td>
            <td>{{$ticket->user_id}}</td>
            <td>{{$ticket->specialist_id}}</td>
          <!--  {{-- <td  class="" width="30%"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#editModal">Edit</button> --}}-->
            <td>    {{--   @if(!Auth::guest()) --}}
                 {{--  @if(Auth::user()->id == $tickets->user_id) --}}
              <a href="/tickets/{{$ticket->id}}/edit" class="btn btn-default">Edit</a>
              <a href="/tickets/{{$ticket->id}}/close" class="btn btn-default">Close</a>
              {!! Form::open(['action' => ['TicketsController@destroy', $ticket->id], 'method'=>'POST', 'class'=>'pull-right']) !!}
                {{Form::hidden('_method','DELETE') }}
                {!! Form::submit('Cancel', ['class'=>'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td>
              
             {{-- @endif
        @endif --}}
            
         {{--    <a href="{{ route('tickets.edit',$ticket->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('tickets.destroy', $ticket->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td> --}}
        </tr>
        @endforeach
         
    </tbody>

  </table>
   <div class="mx-auto">
        	{{$tickets->links()}}
        </div>
<div>

	<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          {!! Form::open(['action' => 'TicketsController@store', 'method' =>'POST','enctype'=> 'multipart/form-data']) !!}
	    {{--    multipart/yaz_database(id, databases) --}}
	        	<div class="form-group">
	        		{!! Form::label('title','Title') !!}
	        		{!! Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}

	        	</div>
	        	
	    
	        	<div class="form-group">
	        		{!! Form::label('Category','Category') !!}
	        		{!! Form::text('category', '', ['class'=>'form-control', 'placeholder'=>'Enter Category']) !!}

	        	</div>

	        	{{-- <div class="form-group">
	        		{!! Form::label('Location','Location') !!}
	        		{!! Form::text('location', '', ['class'=>'form-control', 'placeholder'=>'Enter location']) !!}

	        	</div>
	        	<div class="form-group">
	        		{!! Form::label('Slug','Slug') !!}
	        		{!! Form::text('slug', '', ['class'=>'form-control', 'placeholder'=>'slug']) !!}

	        	</div>

	        	<div class="form-group">
	        		{!! Form::label('Contact','Contact') !!}
	        		{!! Form::text('contact', '', ['class'=>'form-control', 'placeholder'=>'Enter Contact']) !!}

	        	</div> --}}
	        	{{-- <div class="form-group">
	        		{!! Form::label('email', 'E-mail Address', []) !!}
					{{ Form::email('email', '', ['class'=>'form-control','placeholder'=>'example@gmail.com'])}}
	        	</div> --}}
	        	<div class="form-group">
	        		{!! Form::label('description', 'Description', []) !!}
					{{ Form::textarea('description', '', ['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Enter Description'])}}
	        	</div>

	        	<div>
	        		{{Form::file('cover_image')}}

	        		
	        	</div>
	              </div>
      <div class="modal-footer">

      	{!! Form::submit('Submit', ['class'=>'btn btn-primary ']) !!}
        {!! Form::close() !!}


        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       {{--  <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Task:{{$ticket->id}}  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
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
					{{ Form::textarea('description', $ticket->description, ['id'=>'article-ckeditor2','class'=>'form-control','placeholder'=>'Enter Description'])}}
	        	</div>

	        	<div>
	        		{{Form::hidden('_method','PUT')}}
	        		
	        	
	        	</div>
	        	
	             
      <div class="modal-footer">
		{!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
      	
        {!! Form::close() !!}


        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       {{--  <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>
@endsection


