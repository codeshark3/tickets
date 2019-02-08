@extends('layouts.app_layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
 
  <table class="table table-striped responsive table-bordered">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Description</td>
         </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td>{{$ticket->id}}</td>
            <td>{{$ticket->title}}</td>
            <td>{{$ticket->description}}</td>
            
         {{--    <td><a href="{{ route('tickets.edit',$ticket->id)}}" class="btn btn-primary">Edit</a></td>
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
<div>
@endsection