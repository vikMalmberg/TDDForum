    @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new thread</div>

                <div class="card-body">
                    <form method ="POST" action="/threads">
                        {{ csrf_field() }}

                        <div class="form-group">

                           <label for="channel_id" >Choose a channel</label>
                           <select name="channel_id" id="channel_id" class="form-control" required>

                            <option value="">Choose one...</option>
                            @foreach(App\Channel::all() as $channel)
                                <option value="{{$channel->id}}" {{ old('channel_id') == $channel->id ? 'selected' : ' ' }} >
                                    {{$channel->name}}
                                </option>
                            @endforeach
                           </select>


                        </div>

                        <div class="form-group">
                            <label for="title"> EL titel</label>
                            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
                        </div>

                         <div class="form-group">
                            <label for="body"> BodyLabel</label>
                            <textarea  class="form-control" id="body" name="body" rows="8" value="{{ old('body') }}" required></textarea>
                        </div>
                        <button type="submit" class ="btn btn-primary"> publish</button>
                    </form>
                   @if(count($errors))
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
