@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="flex">
                    {{$thread->title}}
                        <a href="{{ route('profile',$thread->creator->name) }}">
                            {{ $thread->creator->name }}
                        </a>

                    </span>
                    <form action="{{ $thread->path() }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                         <button type="submit">Delete</button>
                    </form>
                </div>

                <div class="card-body">
                        <div class="panel-body">

                            {{$thread->body}}

                        </div>
                </div>
            </div>
        </div>
    </div>
       <div class="row ">
        <div class="col-md-8 col-md-offset">
            @foreach ($thread->replies as $reply)

             <div class="card-header mt-4">
                <div class="level">
                    <h5 class="flex">
                        <a href="{{ route('profile',$reply->owner) }}">
                            {{$reply->owner->name}}
                        </a>


                        <span>said {{$reply->created_at->diffForHumans()}}</span>
                    </h5>
                    <div>

                       <form method="POST" action="/replies/{{ $reply->id }}/favorites">

                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                        {{ $reply->favorites_count }} {{ str_plural('Favorite', $reply->favorites_count) }}
                    </button>
                </form>
                    </div>
                </div>
             </div>
            <div class="card ">
                <div class="card-body">
                        <div class="panel-body">
                            {{$reply->body}}
                        </div>
                </div>
            </div>
            @endforeach
            @if(auth()->check())
                <div class="row ">
                    <div class="col-md-8 col-md-offset-4 pt-4">
                        <form method ="POST" action ="{{$thread->path() . '/replies' }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="body" id="body" class="form-control" placeholder="Text to post"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Post reply</button>
                        </form>
                    </div>
                </div>
            @endif

            <h1>{{$thread->created_at->diffForHumans()}}</h1>
            <h1>{{$thread->replies_count}} {{str_plural('comment', $thread->replies_count)}}</h1>

        </div>
    </div>
</div>
@endsection
