@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                 {{ $profileUser->name}}
                 <small> Since {{ $profileUser->created_at->diffForHumans() }}</small>
            </h1>
        </div>
        @foreach($threads as $thread)
        <div class="card">
            <div class="card-header">
                {{$thread->title}}
                {{ $thread->created_at->diffForHumans() }}
            </div>
             <div class="card-body">
                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
              </div>
        </div>
        @endforeach
            {{$threads->links()}}
    </div>

@endsection
