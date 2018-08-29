@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-info text-center lead">Create discussions</div>

    <div class="card-body">
        <form action="{{route('discussion.store')}}" method="post">

        	{{csrf_field()}}

        	<div class="form-group">
        		<label>Title</label>
        		<input type="text" name="title" class="form-control mb-2" value="{{old('title')}}">

				<label>Select Channel</label>
        		<select name="channel_id" class="form-control mb-2">
        			@foreach ($channels as $channel)
        				<option value="{{$channel->id}}">{{$channel->title}}</option>
        			@endforeach
        		</select>

        		<label>Ask Question ?</label>
        		<textarea name="content" class="form-control mb-4">{{old('content')}}</textarea>

        		<input type="submit" value="Create Discussion" class="btn btn-info btn-sm">

        	</div>

        </form>
    </div>
 
</div>
      

@endsection