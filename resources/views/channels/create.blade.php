@extends('layouts.app')

@section('content')

<div class="card">
     <div class="card-header bg-info"><p class="text-center lead m-0">Create channel</p></div>

    <div class="card-body">
        <form action="{{route('channel.store')}}" method="post">
            {{csrf_field()}}

            <div class="form-group">
                <label>Channel's Name</label>
                <input type="text" name="channel" class="form-control mb-2">
                <input type="submit" class="form-control mb-2 btn btn-dark btn-sm">
            </div>
        </form>
    </div>
</div>

@endsection
