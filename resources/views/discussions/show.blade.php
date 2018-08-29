@extends('layouts.app')

@section('content')

{{-- .........................................................FORUM_DISPLAY_SECTION ............................................ --}}
	<div class="card mb-3">
	    <div class="card-header bg-info text-center lead">{{$discussion->title}}
			<span> <a href="{{route('forum')}}" class="btn btn-sm btn-info float-right">back &crarr;</a></span>
	    </div>

	    <div class="card-body">

  	    	<p class="float-left">{{$discussion->content}}</p>

	    </div>

	    <div class="card-footer">
	    	{{-- Buttons for watching and unwatching --}}

	    	@if ($discussion->is_being_watched())
	    		<a href="{{ route('unwatch',['id' => $discussion->id]) }}" class="btn btn-sm btn-danger float-right mb-2">Unwatch the discussion</a>
	    	@else
	    		<a href="{{ route('watch',['id' => $discussion->id]) }}" class="btn btn-sm btn-success float-right mb-2">Watch the discussion</a>
	    	@endif

	    	@if ($discussion->user_id == Auth::id())
	    		<a href="{{route('discussion.edit',['slug' => $discussion->slug])}}" class="btn btn-info btn-sm float-left mr-2">Edit</a>
	    	@endif
	    	
	    </div>

	    
	</div>
	<div class="card">
		{{-- Showing the Best Answer --}}
		@if ($best_answer)

			<div class="card-header bg-info">
				<h3 class="text-dark text-center"><strong>Best Answer &malt;</strong></h3>
				<div class="text-center">
					<img src="{{ $best_answer->user->avatar }}" alt="avatar" height="40" width="40" class="m-0">&nbsp; &nbsp;
					<span>By <strong>{{$best_answer->user->name}}</strong>, ({{$best_answer->user->points}})</span>
				</div>
			</div>
				
			<div class="card-body">
				<p class="text-center">{{$best_answer->content}}</p>
			</div>
			
		@endif
	</div>

	{{-- .........................................................REPLIES_SECTION ............................................ --}}

	&nbsp;<div class="lead pl-3">Replies</div>&nbsp;&nbsp;

	@foreach ($discussion->replies as $reply) 

		<div class="card mb-2">

			<div class="card-header">
				<img src="{{ $reply->user->avatar }}" alt="avatar" height="40" width="40" class="m-0">&nbsp; &nbsp;
				<span>By <strong>{{$reply->user->name}},</strong> ({{$reply->user->points}})</span>

				{{-- For Best Answer --}}
				@if (!$best_answer)
					@if (Auth::id() == $discussion->user_id)
						<a href="{{route('best.answer',['id' => $reply->id])}}" class="btn btn-success float-right btn-sm">Mark as best answer</a>
					@endif
					
				@endif
				
			</div>

			<div class="card-body">
				<p>{{$reply->content}}</p>
			</div>

			<div class="card-footer">
				
				{{-- button choises for Thumbs.. --}}

				@if ($reply->is_liked_by_auth_user())
					<a href="{{route('reply.unlike',['id' => $reply->id]) }}" class="float-right btn btn-sm btn-danger">&nbsp;Unlike&nbsp;<span class="badge bg-primary">{{$reply->likes->count()}}</span></a>
				@else
					<a href="{{route('reply.like',['id' => $reply->id]) }}" class="float-right btn btn-sm btn-info">&nbsp;like&nbsp;<span class="badge bg-primary">{{$reply->likes->count()}}</span></a>
				@endif

				@if (!$reply->best_answer)
					@if (Auth::id() == $reply->user_id)
						<a href="{{route('reply.edit',['id' => $reply->id])}}" class="btn btn-sm btn-primary float-left">edit</a>
					@endif
				@endif
			</div>

		</div>
	@endforeach

	{{-- ................................................ REPLY_FORM_DISPLAY ............................................. --}}

	<div class="card">
		<div class="card-body">

			@if (Auth::check()) {{-- check for logged-in user --}}
				<form action="{{route('discussion.reply',['id'=>$discussion->id])}}" method="post">
					{{csrf_field()}}
					
					<div class="form-group">
						<label class="lead">Leave a comment</label>
						<textarea name="content" cols="30" rows="10" class="mb-2 form-control" required></textarea>
						<input type="submit" value="Comment" class="btn btn-sm btn-primary">
					</div>

				</form>
			@else
				<div class="text-center lead">Please login to leave a comment</div>
			@endif

		</div>
	</div>
	
	
@endsection
