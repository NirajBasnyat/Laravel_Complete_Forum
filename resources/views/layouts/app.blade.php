<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'QuestionMark') }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
       @include('includes.navbar')

        <div class="container">
            <div class="row">

                <div class="col-md-4">

                  @if (Auth::check())
                        <a href="{{route('channel.create')}}" class="btn btn-info btn-block">Create channel</a>
                        <a href="{{route('discussion.create')}}" class="btn btn-info btn-block mb-2">Create discussion</a>
                  @endif

                 {{-- links to the filtered attributes --}}
                  <div class="card mb-3">
                    <div class="card-body bg-info">
                      <ul class="list-group">
                          @if (Auth::check())
                            <li class="list-group-item mb-1"><a href="/forum?filter=me" style="text-decoration: none;">My discussions</a></li>
                          @endif
                            <li class="list-group-item mb-1"><a href="/forum?filter=solved" style="text-decoration: none;">Answered discussions</a></li>
                            <li class="list-group-item mb-1"><a href="/forum?filter=unsolved" style="text-decoration: none;">Unanswered discussions</a></li>
                          @if (Auth::check())
                            @if (Auth::user()->admin)
                               <li class="list-group-item"><a href="/channel" style="text-decoration: none;">All channels</a></li>
                            @endif
                          @endif
                      </ul>
                    </div>
                  </div>
                  
                 
                  <div class="card bg-info">
                    <div class="card-header text-center">Channel List</div>
                    <div class="card-body">
                         @foreach ($channels as $channel)
                            <ul class="list-group">
                                <li class="list-group-item mb-1"><a href="{{route('channels',['slug' => $channel->slug])}}" style="text-decoration: none;">{{$channel->title}}</a></li>
                            </ul>
                        @endforeach
                    </div>
                  </div>
                </div>

                <div class="col-md-8">
                    @if ($errors->count() > 0)
                        <div class="card">
                           <div class="card-body text-center">
                               @foreach ($errors->all() as $error)
                                   <ul class="list-group">
                                       <li class="list-group-item bg-danger">{{$error}}</li>
                                   </ul>
                               @endforeach
                            </div>
                         </div>
                    @endif
                    
                     @yield('content')
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/toastr.min.js') }}" ></script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif
    </script>

</body>
</html>
