@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-info"><p class="text-center lead m-0">Channels</p></div>

    <div class="card-body">
       
      <table class="table">

        <thead>
          <tr>
            <th>Channel</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        
        <tbody>

            @foreach ($channels as $channel)
                <tr>
                  <td>{{$channel->title}}</td>

                  <td>
                      <a href="{{route('channel.edit',['id' => $channel->id]) }}" class="btn btn-secondary btn-sm">Edit</a>
                  </td>

                  <td>
                      <form action="{{route('channel.destroy',['id' => $channel->id ]) }}" method="post">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                      </form>
                  </td>
                </tr>
            @endforeach
        
        </tbody>
      </table>
        
    </div>
</div>

@endsection