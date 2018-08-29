@extends('layouts.app')

@section('content')

{{-- ................................................ REPLY_FORM_DISPLAY ............................................. --}}

<div class="card">
	<div class="card-body">

		@if (Auth::check()) {{-- check for logged-in user --}}
			<form action="{{route('reply.update',['id'=>$reply->id])}}" method="post">
				{{csrf_field()}}
				
				<div class="form-group">
					<label class="lead">update a comment</label>
					<textarea name="content" cols="30" rows="10" class="mb-2 form-control" required>{{$reply->content}}</textarea>
					<input type="submit" value="Comment" class="btn btn-sm btn-primary">
				</div>

			</form>
		@else
			<div class="text-center lead">Please login to leave a comment</div>
		@endif

	</div>
</div>
	
	
@endsection