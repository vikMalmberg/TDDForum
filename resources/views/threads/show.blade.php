@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$thread->title}}</div>

                <div class="card-body">
                        <div class="panel-body">
                            {{$thread->body}}
                        </div>
                </div>
            </div>
        </div>
    </div>
       <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset">
            @foreach ($thread->replies as $reply)
             <div class="card-header mt-4">{{$reply->created_at->diffForHumans()}}</div>
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

        </div>
    </div>
</div>
@endsection
