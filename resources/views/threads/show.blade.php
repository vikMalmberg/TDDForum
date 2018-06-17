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

        </div>
    </div>
</div>
@endsection
