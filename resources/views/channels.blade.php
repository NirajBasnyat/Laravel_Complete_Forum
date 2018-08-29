@extends('layouts.app')

@section('content')

    @foreach ($discussions as $discussion)
        <div class="card mb-4">
            <div class="card-header bg-info">
                 <img src="{{ $discussion->user->avatar }}" alt="avatar" height="40" width="40" class="m-0">&nbsp; &nbsp;
                 <span>{{$discussion->user->name}}, <i>{{$discussion->created_at->diffForHumans()}}</i></span>
                 <a href="{{route('discussion.show',['slug' => $discussion->slug])}}" class="btn btn-success btn-sm float-right">View</a>

                  @if ($discussion->has_best_answer())
                    <a href="#" class="btn btn-dark btn-sm float-right mr-2">closed</a>
                 @else
                    <a href="#" class="btn btn-primary btn-sm float-right mr-2">open</a>
                 @endif
                 
            </div>
             
            <div class="card-body">
                <p class="text-center lead">{{$discussion->title}}</p>
                <p class="text-justify mb-2">{{str_limit($discussion->content),40}}</p>
            </div>

            <div class="card-footer">
                <span>Replies: {{$discussion->replies->count()}}</span>
                <a href="{{route('channels',['slug' => $discussion->channel->slug])}}" class="btn btn-sm btn-info float-right">{{$discussion->channel->title}}</a>
            </div>

        </div>
    @endforeach

    <div class="text-center">
       
    </div>
      

@endsection
