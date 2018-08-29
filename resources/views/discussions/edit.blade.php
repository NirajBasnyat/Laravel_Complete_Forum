@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-info text-center lead">Update discussions</div>

    <div class="card-body">
        <form action="{{route('discussion.update',['id' => $discussion->id])}}" method="post">

        	{{csrf_field()}}
        		<label>Edit the Question ?</label>
        		<textarea name="content" class="form-control mb-4">{{$discussion->content}}</textarea>

        		<input type="submit" value="Save Changes" class="btn btn-info btn-sm">

        	</div>

        </form>
    </div>
 
</div>
      

@endsection