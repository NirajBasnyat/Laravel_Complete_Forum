@extends('layouts.app')

@section('content')

<div class="card">
     <div class="card-header bg-primary"><p class="text-center lead m-0">Edit channel</p></div>


    <div class="card-body bg-primary">
        <form action="{{route('channel.update',['channel' => $channel->id])}}" method="post">
            {{csrf_field()}}

            {{method_field('PUT')}}

            <div class="form-group">
                <label>Update Channel</label>
                <input type="text" name="channel" value="{{$channel->title}}" class="form-control mb-2">
                <input type="submit" value="update" class="form-control mb-2 btn btn-dark btn-sm">
            </div>
        </form>
    </div>
</div>

@endsection